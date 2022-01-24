const url="http://127.0.0.1:8000/";
const search=document.querySelector("#search");
const content=document.querySelector("#content");
const meta=document.querySelector('meta[name="csrf-token"]');
console.log(meta);

document.addEventListener("DOMContentLoaded",e=>{
    search.addEventListener("keyup",searchf);
});
async function searchf(e){
    content.innerHTML="";
    const responce=await fetch("/prospects/"+e.target.value,{ headers:{
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
     }}
    );
    const resp=await responce.json();
    resp.forEach(element => {
        const tr=document.createElement("tr");
        if(element.Estatus==1){
            tr.classList.add("bg-success");
        }
        else if(element.Estatus){
            tr.classList.add("bg-danger");
        }
        const id=document.createElement("th");
        const a=document.createElement("a");
        a.href=`/prospects/${element.id}`;
        a.textContent=element.id;
        id.appendChild(a);
        id.scope="row";
        tr.appendChild(id);

        const nombre=document.createElement("td");
        nombre.textContent=`${element.apellidoPaterno} ${element.apellidoMaterno} ${element.nombre}`;
        tr.appendChild(nombre);


        const calle=document.createElement("td");
        calle.textContent=`${element.calle}`;
        tr.appendChild(calle);

        const numero=document.createElement("td");
        numero.textContent=`${element.numero}`;
        tr.appendChild(numero);

        const colonia=document.createElement("td");
        colonia.textContent=`${element.colonia}`;
        tr.appendChild(colonia);

        const cp=document.createElement("td");
        cp.textContent=`${element.cp}`;
        tr.appendChild(cp);

        const email=document.createElement("td");
        colonia.textContent=`${element.email}`;
        tr.appendChild(email);

        const phone=document.createElement("td");
        phone.textContent=`${element.phone}`;
        tr.appendChild(phone);

        const rfc=document.createElement("td");
        rfc.textContent=`${element.email}`;
        tr.appendChild(rfc);

        const puesto=document.createElement("td");
        puesto.textContent=`${element.has_puesto.display_name}`;
        tr.appendChild(puesto);

        const acciones=document.createElement("td");

        if(element.Estatus==0){
            const form=document.createElement("form");
            form.action=`/prospects/${element.id}`;
            form.method="post";
            const inputtoken=document.createElement("input");
            inputtoken.type="hidden";
            inputtoken.name="_token";
            inputtoken.value=meta.getAttribute('content');
            const inputhidden=document.createElement("input");
            inputhidden.type="hidden";
            inputhidden.name="_method";
            inputhidden.value="PUT";
            const btn_acept=document.createElement("button");
            btn_acept.classList.add("btn","btn-success");
            btn_acept.name="acept";
            btn_acept.value="acept";
            btn_acept.textContent="Autorizar";

            const btn_reject=document.createElement("button");
            btn_reject.classList.add("btn","btn-danger","mt-2");
            btn_reject.name="acept";
            btn_reject.value="reset";
            btn_reject.textContent="Rechazar";
            form.appendChild(inputtoken);
            form.appendChild(inputhidden);
            form.appendChild(btn_acept);
            form.appendChild(btn_reject);
            acciones.appendChild(form);
        }

        tr.appendChild(acciones);

        content.appendChild(tr);
    });
    console.log(resp);
}
