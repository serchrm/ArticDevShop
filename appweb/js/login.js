const imagen= document.querySelector("#imagenCaptcha");

const generarCaptcha = ()=>{
    let solicitud = new XMLHttpRequest();
    solicitud.onreadystatechange=()=>{
        if(solicitud.readyState==4&&solicitud.status==200){
            imagen.src="../otherResources/imagenCaptcha.jpeg";
        }
    }
    solicitud.open("GET","../mod/Captcha.php",true);
    solicitud.send();
}

generarCaptcha();