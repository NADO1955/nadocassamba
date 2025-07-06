$(document).ready(function () {
    // Executa quando o DOM estiver totalmente carregado

    // === Alerta ao submeter o formulário do Registo Clínico do Utente (RCU) ===
    $('#form-rcu').on('submit', function (e) {
        // Exibe uma mensagem de confirmação ao enviar o RCU
        alert('🟢 Informações do Registo Clínico do Utente (RCU) enviadas com sucesso!');
        // Se necessário, pode-se adicionar validações aqui no futuro
    });

    // === Validação do formulário de marcação ===
    $('#form-marcacao').on('submit', function (e) {
        // Captura os elementos dos campos
        let especialidade = $('select[name="especialidade_id"]');
        let medico = $('select[name="medico_id"]');
        let data = $('input[name="data"]');

        let valido = true; // Flag para verificar se todos os campos estão preenchidos

        // Remove classes de erro anteriores, caso existam
        especialidade.removeClass('is-invalid');
        medico.removeClass('is-invalid');
        data.removeClass('is-invalid');

        // Verifica se o campo "especialidade" foi preenchido
        if (!especialidade.val()) {
            especialidade.addClass('is-invalid'); // Adiciona classe Bootstrap de erro
            valido = false;
        }

        // Verifica se o campo "médico" foi preenchido
        if (!medico.val()) {
            medico.addClass('is-invalid');
            valido = false;
        }

        // Verifica se o campo "data" foi preenchido
        if (!data.val()) {
            data.addClass('is-invalid');
            valido = false;
        }

        // Se algum campo obrigatório estiver vazio, impede o envio do formulário
        if (!valido) {
            e.preventDefault(); // Bloqueia o envio
            alert('⚠️ Por favor, preencha todos os campos obrigatórios da marcação.');
        }
    });
});
