<div class="container my-5">
    <h1 class="display-4 text-center fw-bold mb-5">Contato</h1>

    <form id="formContato" class="bg-dark bg-opacity-10 p-4 p-md-5 rounded-4 shadow" novalidate>
        <div class="row g-3">
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Nome completo *" required minlength="3">
            </div>
            <div class="col-12 mb-3">
                <input type="email" class="form-control" placeholder="E-mail *" required>
            </div>
            <div class="col-12 mb-3">
                <input type="tel" class="form-control" placeholder="Telefone/WhatsApp *" required pattern="[0-9]{11}">
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Empresa (opcional)">
            </div>
            <div class="col-12 mb-3">
                <select class="form-select" required>
                    <option value="">Assunto *</option>
                    <option>Orçamento Pack STL</option>
                    <option>Modelagem Personalizada</option>
                    <option>Dúvida</option>
                </select>
            </div>
            <div class="col-12 mb-4">
                <textarea class="form-control" rows="4" placeholder="Mensagem *" required minlength="10"></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold">
                    ENVIAR
                </button>
            </div>
        </div>
    </form>

    <div id="msgSucesso" class="alert alert-success text-center mt-4 d-none rounded-3">
        Mensagem enviada! Entraremos em contato em até 24h.
    </div>
</div>

<script>
    document.getElementById('formContato').addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            this.classList.add('was-validated');
        } else {
            e.preventDefault();
            document.getElementById('msgSucesso').classList.remove('d-none');
            this.reset();
            this.classList.remove('was-validated');
        }
    });
</script>