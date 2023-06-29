import "./bootstrap";
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Upload file",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Delete File",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const publishedImg = {};
            publishedImg.size = 1234;
            publishedImg.name = document.querySelector('[name="image"]').value;

            this.options.addedfile.call(this, publishedImg);
            this.options.thumbnail.call(
                this,
                publishedImg,
                `/uploads/${publishedImg.name}`
            );

            publishedImg.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("sending", function (file, xhr, formData) {
    console.log(file);
});

dropzone.on("success", function (file, response) {
    console.log(response.img);
    document.querySelector('[name="image"]').value = response.img;
});

dropzone.on("error", function (file, message) {
    console.log(message);
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="image"]').value = "";
});
