 // Slide Toggle da setinha que mostra a descrição 
$(document).ready(function() {
    $('.toggle-title').click(function() {
      $(this).next('.description').slideToggle(); // Alterna o slide da descrição
      $(this).find('.arrow-icon').toggleClass('rotate'); // Alterna a classe para girar a seta
    });
  });


