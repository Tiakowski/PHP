// Função para impedir o envio do formulário sem um título preenchido

  document.getElementById('task-form').addEventListener('submit', function(event) {
    var titleInput = document.getElementById('title');
    if (titleInput.value.trim() === '') { // Verifica se o campo de título está vazio
      event.preventDefault();  // Impede o envio do formulário
      alert('Por favor, preencha o campo de título.');
    }
  });
