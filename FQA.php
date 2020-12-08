<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes</title>
</head>
<body>
    <?php include "header.php"?>
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