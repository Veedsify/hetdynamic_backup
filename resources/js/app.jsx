import React, { useRef } from "react";
import { createRoot } from "react-dom/client";
import { useState } from "react";
import "./css/style.css";
import Editor from "./components/editor";
import axios from "axios";
import { BrowserRouter, useLocation } from "react-router-dom";
import { toast, Toaster } from "sonner";

const App = () => {
    const router = useLocation();
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const [image, setImage] = useState("/custom/placeholder.png");
    const [imageFile, setImageFile] = useState("/custom/placeholder.png");
    const [categories, setCategories] = useState([]);
    const [editorContext, setEditorContext] = useState();
    const [inputs, setInputs] = useState({});

    const ref = useRef();

    const handleInputChange = (e) => {
        setInputs((prev) => ({
            ...prev,
            [e.target.name]: e.target.value,
        }));
    };

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();
        const acceptedImageTypes = [
            "image/gif",
            "image/jpeg",
            "image/jpg",
            "image/png",
        ];
        if (!acceptedImageTypes.includes(file["type"])) {
            toast.error("Sorry, only images are allowed");
            return;
        }
        reader.onloadend = () => {
            setImage(reader.result);
            setImageFile(file);
        };
        reader.readAsDataURL(file);
    };

    React.useEffect(() => {
        const getAllCategories = async () => {
            const response = await axios.post("/api/categories"); // Fetch categories
            setCategories(response.data.categories); // Set categories
        };
        getAllCategories(); // Call the function to fetch categories
    }, [setCategories]);

    const addNewBlog = async (e) => {
        e.preventDefault();
        if (!inputs.title || inputs.title.length < 5) {
            toast.error("Sorry article needs a title");
            return;
        }
        if (!inputs.tags || inputs.tags.length < 5) {
            toast.error("Sorry article needs meta tags");
            return;
        }
        if (!inputs.category || inputs.category.length < 1) {
            toast.error("please select a category from the list");
            return;
        }
        if (!inputs.description || inputs.description.length < 5) {
            toast.error("Sorry article needs a description");
            return;
        }
        if (!imageFile) {
            toast.error("Please select a featured image");
        }

        let formData = new FormData();
        for (let key in inputs) {
            formData.append(key, inputs[key]);
        }
        formData.append("file", imageFile);
        formData.append("html", JSON.stringify(editorContext));
        formData.append("_token", csrfToken);
        const response = await fetch("/admin/blog/create/new", {
            method: "POST",
            body: formData,
        });

        const createBlog = response.ok ? await response.json() : null;
        if (createBlog) {
            toast.success("Post Added Successfully");
            document.location.reload();
            ref.current.reset();
        }
    };
    return (
        <>
            <form ref={ref} className="screen">
                <div className="">
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        onChange={handleInputChange}
                        placeholder="Add Title"
                        className="title-article-form"
                    />
                    <div className="editor_container">
                        <Editor set={setEditorContext} />
                    </div>

                    <div>
                        <label htmlFor="tags">Tags *(Comma Seperated)</label>
                        <input
                            type="text"
                            id="tags"
                            name="tags"
                            required
                            onChange={handleInputChange}
                            className="form-input input-border "
                        />
                    </div>
                    <div>
                        <label htmlFor="category">Category</label>
                        <select
                            type="text"
                            id="category"
                            name="category"
                            onChange={handleInputChange}
                            defaultValue={1}
                            className="form-input input-border"
                        >
                            <option value="1" disabled>
                                (-- SELECT --)
                            </option>
                            {categories &&
                                categories.map((category, index) => {
                                    return (
                                        <option
                                            value={category.name}
                                            key={index}
                                        >
                                            {category.name}
                                        </option>
                                    );
                                })}
                        </select>
                    </div>
                    <div>
                        <label htmlFor="description">Description</label>
                        <textarea
                            type="text"
                            name="description"
                            id="description"
                            onChange={handleInputChange}
                            rows={10}
                            className="form-input input-border "
                        ></textarea>
                    </div>
                </div>
                <label htmlFor="featured_image" id="file_upload_label">
                    <p>Featured Image</p>
                    <input
                        onChange={handleImageChange}
                        type="file"
                        className="form-input hidden"
                        id="featured_image"
                    />
                    <div className="image-center">
                        <img src={image} alt="" width="500" />
                    </div>
                </label>
                <div>
                    <input
                        onClick={addNewBlog}
                        type="submit"
                        value="Save"
                        className="form-input bg-primary text-white"
                    />
                </div>
            </form>
        </>
    );
};

createRoot(document.getElementById("app")).render(
    <BrowserRouter>
        <Toaster richColors position="top-center" />
        <App />
    </BrowserRouter>
);
