import React, { useEffect, useState } from "react";
import "@blocknote/core/fonts/inter.css";
import "@blocknote/react/style.css";
import { BrowserRouter, useLocation } from "react-router-dom";
import { createRoot } from "react-dom/client";
import { Toaster } from "sonner";
import "./css/style.css";
import EditorPreview from "./components/editorpreview";

const App2 = () => {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const { pathname } = useLocation();
    const slug = pathname.replace("/blog/", "");
    const [contents, setContents] = useState(null);
    const [isLoading, setIsLoading] = useState(true); // Track loading state

    useEffect(() => {
        const fetchData = async () => {
            setIsLoading(true); // Set loading state to true before fetch
            try {
                const res = await fetch("/blog/block/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "CSRF-Token": csrfToken,
                    },
                    body: JSON.stringify({
                        _token: csrfToken,
                        slug,
                    }),
                });

                if (res.ok) {
                    const datablocks = await res.json();
                    setContents(datablocks.blocks || []); // Set empty array if blocks is missing
                } else {
                    console.error("Failed to fetch data:", res.statusText);
                    // Handle fetch errors gracefully (e.g., display an error message)
                }
            } catch (error) {
                console.error("Error fetching data:", error);
                // Handle other errors gracefully
            } finally {
                setIsLoading(false); // Set loading state to false after fetch
            }
        };

        fetchData();
    }, [slug, csrfToken]); // Re-fetch on slug or csrfToken change

    if (isLoading) {
        return <div>Loading...</div>;
    }

    if (!contents || !contents.length) {
        return <div>No content found.</div>; // Handle empty content scenario
    }

    return <EditorPreview contents={contents} />;
};

createRoot(document.getElementById("app2")).render(
    <BrowserRouter>
        <Toaster richColors position="top-center" />
        <App2 />
    </BrowserRouter>
);
