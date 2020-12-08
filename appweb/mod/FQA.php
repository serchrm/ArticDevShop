<!DOCTYPE html>
<html lang="en">
<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
</head>
<body>
    <?php require "header.php"?>
  <section id="preguntas">
     <h1 id="title">Preguntas Frecuentes</h1>
      <div class="con-accordion">
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      How to create a new project?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem possimus suscipit harum, tempora distinctio quam tenetur aliquam illo dolorem quaerat saepe voluptatum, beatae temporibus non et blanditiis laudantium sapiente atque.
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      How to create a new project?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem possimus suscipit harum, tempora distinctio quam tenetur aliquam illo dolorem quaerat saepe voluptatum, beatae temporibus non et blanditiis laudantium sapiente atque.
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      How to create a new project?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem possimus suscipit harum, tempora distinctio quam tenetur aliquam illo dolorem quaerat saepe voluptatum, beatae temporibus non et blanditiis laudantium sapiente atque.
                  </p>
              </div>
          </div>
      </div>
    
  </section>
   
    <script>
        function handleClick(evt){
            const content = evt.target.nextElementSibling;
            if(!evt.target.parentNode.classList.contains('open')){
                content.style.height = `${content.scrollHeight}px`;
                evt.target.parentNode.classList.add('open');
            }else{
                content.style.height=`0px`;
                evt.target.parentNode.classList.remove('open');
            }
        }
    </script>
    <?php include "footer.php"?>
</body>
</html>