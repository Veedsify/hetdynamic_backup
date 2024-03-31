$(document).ready(function () {

    $(".add_more_content_buttons").click(function (e) {
        const container = $("#" + $(e.target).data("container"));
        // Empty the input fields
        const newcontent = container.children().first().clone(true);
        newcontent.find("input").val("");

        // Remove CKEditor toolbar div
        newcontent.find(".ck").remove();

        newcontent.find("textarea").val("").removeAttr("data-editor");
        container.append(newcontent);
        ClassicEditor.create(newcontent.find("textarea")[0])
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
                })
                console.log('Editor initialized', editor);
            })
            .catch(error => {
                console.error('Error initializing editor', error);
            });
    });


    $(".remove_content_buttons").click(function (e) {
        const container = $("#" + $(e.target).data("container"));
        if (container.children().length > 1) {
            container.children().last().remove();
        }
    });


    $(".active_switch").on("change", function (e) {
        // all form elements except checkboxes
        const parent = $(e.target).closest("div");
        const allInputs = parent.find("input, select, textarea").not(":checkbox");
        allInputs.prop("disabled", !e.target.checked);

        // Create a gray overlay
        if (e.target.checked) {
            parent.find(".overlay").remove();
        } else {
            const overlay = $("<div>").addClass("overlay").css({
                position: "absolute",
                top: 0,
                left: 0,
                width: "100%",
                height: "100%",
                background: "rgba(255, 255, 255, 0.2)",
                backdropFilter: "blur(3px)",
                zIndex: 1000
            });
            parent.prepend(overlay);
        }
    });

    $(".active_switch").trigger("change");

    $('#addNewServiceForm').on("submit", function (e) {
        try {
            const checkBoxes = $(this).find("input[type=checkbox]:checked");
            let allFieldsFilled = true;
            let message = '';
            const title = $(this).find("input[name=title]").val().length > 0;
            const featured_image = $(this).find("input[name=image]").prop("files").length > 0;
            const tags = $(this).find("input[name=tags]").val().length > 0;

            if (!title || !featured_image || !tags) {
                allFieldsFilled = false;
                message = ` 
                ${!title ? "Title" : ''}
                ${!featured_image ? "Featured Image" : ''}
                ${!tags ? "Tags" : ''}
            `;
            } else {
                checkBoxes.each(function () {
                    const parent = $(this).closest("div");
                    const allInputs = parent.find("[data-selected='true']")

                    allInputs.each(function () {
                        if (!$(this).val() || ($(this).attr("type") === "file" && !$(this).prop("files").length)) {
                            allFieldsFilled = false;
                            message = parent.find("h1").text().trim();
                            console.log($(this))
                            return false; // break the loop
                        }
                    });

                    if (!allFieldsFilled) {
                        return false; // break the loop
                    }
                });
            }

            if (!allFieldsFilled) {
                e.preventDefault();
                swal({
                    title: "Error!",
                    text: `Please fill all fields in the ${message}`,
                    icon: "error",
                });
            }

        } catch (error) {
            console.log(error);
        }
    });


    $('#editPreviousService').on("submit", function (e) {
        try {
            const checkBoxes = $(this).find("input[type=checkbox]:checked");
            let allFieldsFilled = true;
            let message = '';
            const title = $(this).find("input[name=title]").val().length > 0;
            const tags = $(this).find("input[name=tags]").val().length > 0;

            if (!title || !tags) {
                allFieldsFilled = false;
                message = ` 
                ${!title ? "Title" : ''}
                ${!featured_image ? "Featured Image" : ''}
                ${!tags ? "Tags" : ''}
            `;
            } else {
                checkBoxes.each(function () {
                    const parent = $(this).closest("div");
                    const allInputs = parent.find("[data-selected='true']")

                    allInputs.each(function () {
                        if ($(this).val().length === 0 && $(this).attr("type") !== "file") {
                            allFieldsFilled = false;
                            message = parent.find("h1").text().trim();
                            console.log($(this))
                            return false; // break the loop
                        }
                    });

                    if (!allFieldsFilled) {
                        return false; // break the loop
                    }
                });
            }

            if (!allFieldsFilled) {
                e.preventDefault();
                swal({
                    title: "Error!",
                    text: `Please fill all fields in the ${message}`,
                    icon: "error",
                });
            }

        } catch (error) {
            console.log(error);
        }
    });

    // Function to handle file input change events
    function handleFileInputChange(e) {
        const file = e.target.files[0];

        if (file.size > 2097152) {
            swal({
                title: "Error",
                text: "File size must be less than 2MB",
                icon: "error",
            });
            e.target.value = "";
            return;
        } else {
            const img = e.target.closest("label").querySelector("img");
            if (img) {
                img.src = URL.createObjectURL(file);
            }
        }
    }

    // Function to attach file input change event listeners
    function attachFileInputChangeListeners(selector) {
        const fileInputs = document.querySelectorAll(selector);
        fileInputs.forEach(input => {
            input.addEventListener("change", handleFileInputChange);
        });
    }

    // Attach change event listeners for file inputs in 'addNewServiceForm' and 'editPreviousService' forms
    attachFileInputChangeListeners('#addNewServiceForm input[type=file]');
    attachFileInputChangeListeners('#editPreviousService input[type=file]');
    attachFileInputChangeListeners('#featured_article_image');

    // Attach change event listener for featured article image input

    // Attach change event listener for other file inputs
    document.querySelectorAll("input[type=file]").forEach(input => {
        input.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file.size > 2097152) {
                swal({
                    title: "Error",
                    text: "File size must be less than 2MB",
                    icon: "error"
                });
                e.target.value = "";
                return;
            }
        });
    });


});
