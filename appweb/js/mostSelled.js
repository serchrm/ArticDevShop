const take= (namex)=>{
    return document.querySelector(namex);
}
const elementosComp = [take(".img1"),take(".img2"),take(".img3"),take(".img4"),take(".img5")];

window.onload=()=>{
    let petic = new XMLHttpRequest();
    petic.onreadystatechange=()=>{
        if (petic.readyState===4&&petic.status===200){
            let masVendidos= JSON.parse(petic.responseText);
            let $i=1;
            for (let aux of masVendidos){
                let tarjeta=document.querySelector(".img"+$i);
                tarjeta.style.backgroundImage="url('/appweb/images/prodPics/"+aux["idProd"]+".png')";
                //tarjeta.style="background-image: url('../images/prodPics"+aux["idProd"]+"');";
                tarjeta.innerHTML="<p>"+aux["nombre"]+"</p>";
                $i++;
            }
        }
    }
    petic.open("GET","/appweb/mod/viewedResponse.php",true);
    petic.send();
}