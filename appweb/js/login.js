const imagen= document.querySelector("#imagenCaptcha");
const botonCaptc = document.querySelector("#refreshCaptcha");
const botonSubmit = document.querySelector("#botonSubmit");
const avisos = document.querySelector("#avisos");
const campoEmail = document.querySelector("#correo");
const campoContras = document.querySelector("#contras");
const campoCaptcha=document.querySelector("#textFieldCaptcha");
const formulario =document.querySelector("#formularioLogin");

const generarCaptcha = ()=>{
    let solicitud = new XMLHttpRequest();
    solicitud.onreadystatechange=()=>{
        if(solicitud.readyState==4&&solicitud.status==200){
            let nuevaImagen=document.createElement("img");
            nuevaImagen.src="../otherResources/imagenCaptcha.jpeg";
            document.querySelector(".captcha").removeChild(document.querySelector("#imagenCaptcha"));
            nuevaImagen.id="imagenCaptcha";
            document.querySelector(".captcha").append(nuevaImagen);
        }
    }
    solicitud.open("GET","../mod/Captcha.php",true);
    solicitud.send();
};
const validarDatos= ()=>{
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(campoEmail.value.trim().toLowerCase())){
        avisos.innerHTML="Favor de verificar el campo email";
    }else{
        if (campoContras.value==""||campoCaptcha.value==""){
            avisos.innerHTML="Favor de llenar todos los campos";
        }else{
            return true;
        }
    }
    return false;
}

generarCaptcha();
botonCaptc.addEventListener("click",generarCaptcha);
botonSubmit.addEventListener("click",()=>{
    if(validarDatos()){
        let requestCapt=new XMLHttpRequest();
        requestCapt.onreadystatechange= ()=>{
            if(requestCapt.readyState==4&&requestCapt.status==200){
                if (requestCapt.responseText=="true"){
                    formulario.submit();
                }else{
                    avisos.innerHTML="El captcha no coincide";
                    generarCaptcha();
                    campoContras.value="";
                    campoEmail.value="";
                    campoCaptcha.value="";
                }
            }
        }
        requestCapt.open("GET","../responses/veriffyCaptcha.php?captcha="+campoCaptcha.value,true);
        requestCapt.send();
    }
});
