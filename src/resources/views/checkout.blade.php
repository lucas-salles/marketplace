@extends('layouts.front')

@section('stylesheets')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')
<div class="container">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h2>Dados para Pagamento</h2>
                <hr>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Nome no Cartão</label>
                    <input type="text" name="card_name" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Número do Cartão <span class="brand"></span></label>
                    <input type="text" name="card_number" class="form-control">
                    <input type="hidden" name="card_brand">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Mês de Expiração</label>
                    <input type="text" name="card_month" class="form-control">
                </div>

                <div class="col-md-4 form-group">
                    <label>Ano de Expiração</label>
                    <input type="text" name="card_year" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 form-group">
                    <label>Código de Segurança</label>
                    <input type="text" name="card_cvv" class="form-control">
                </div>

                <div class="col-md-12 form-group installments"></div>
            </div>

            <button type="submit" class="btn btn-lg btn-success processCheckout">Efetuar Pagamento</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    const sessionId = '{{session()->get("pagseguro_session_code")}}';
    
    PagSeguroDirectPayment.setSessionId(sessionId);
</script>

<script src="{{asset('assets/js/checkout.js')}}"></script>
@endsection