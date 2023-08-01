$(document).ready(function() {
    $('#priority-filter').change(function() { // Função acionada quando há uma mudança no elemento com ID "priority-filter"
        var priority = $(this).val(); // Obtém o valor da prioridade selecionada
            // Fazer uma requisição AJAX para a rota "/task/priority"
            $.ajax({
                url: '/task/priority', // URL da rota para filtrar por prioridade
                type: 'GET',
                data: { priority: priority }, // Parâmetros da requisição (prioridade selecionada)
                success: function(response) {
                    $('body').html(response); // Atualiza o conteúdo do corpo da página com a resposta recebida
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
       
    });
});
