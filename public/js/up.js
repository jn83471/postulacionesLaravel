const add_btn=document.querySelector("#btn-add");



document.addEventListener("DOMContentLoaded",e=>{
    add_btn.addEventListener("change",function(element){
        var files = element.target.files;
        let input = element.target;
        while (!input.classList.contains("parent-element")) {
            input = input.parentElement;
        }

        const container=document.createElement("div");
        container.classList.add("col-12","p-5","text-center","temporal");
        const span=document.createElement("span");
        span.classList.add("h5","text-success");
        span.textContent=files[0].name;
        const small=document.createElement("small");
        small.classList.add("d-block");
        small.textContent=files[0].type;
        const inputfile=document.createElement("input");
        inputfile.type="file";
        inputfile.name="files[]";
        inputfile.classList.add("d-none");
        inputfile.files=files;
        container.appendChild(span);
        container.appendChild(small);
        container.appendChild(inputfile);
        input.appendChild(container);
    });
})
