@extends ('dashboard.template.main')

@section('title','Pagar')

@section('errorMessage','Error Pagar')

@section('content')

    <div id="main" class="card">
        <div class="card-header">
            <div class="card-title">
                <a href="https://biz.payulatam.com/B0b903d6BF43915"><img src="http://www.payulatam.com/img-secure-2015/boton_pagar_mediano.png"></a>
            </div>
        </div>
        <div class="card-body">
            <p>
                https://biz.payulatam.com/L0b903d6BF43915
            </p>

            <p>
            API KEY:
            6LzAtZoulnpdjKHvwA511D47xe
            </p>

            <p>
            API LOGIN:
            1IwQ7V7QbeRI9T1
            </p>

            <p>
            Llave pública:
            PKlO6B24l21N78cN585353u88i
            </p>

            <p>
                asignature: “ApiKey~merchantId~referenceCode~amount~currency”.
                <br>
                6LzAtZoulnpdjKHvwA511D47xe~757821~Giov24f127~450000~COP
            </p>
        </div>

        <div class="card-footer">
            <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
                <input name="merchantId"    type="text"  value="757821">
                <input name="referenceCode" type="text"  value="Giov24f127">
                <input name="description"   type="text"  value="Prueba del producto">
                <input name="amount"        type="text"  value="450000">
                <input name="tax"           type="text"  value="0">
                <input name="taxReturnBase" type="text"  value="0" >
                <input name="signature"     type="text"  value="0e88bb361103392425bf3d837f792b16"  >
                <input name="accountId"     type="text"  value="512321" >
                <input name="currency"      type="text"  value="COP" >
                <input name="buyerFullName" type="text"  value="Usuario de prueba">
                <input name="buyerEmail"    type="text"  value="test@test.com" >
                <input name="test"          type="text"  value="1" >
                <input name="responseUrl"    type="text"  value="http://www.test.com/response" >
                <input name="confirmationUrl"    type="text"  value="http://www.test.com/confirmation" >
                <input name="Submit" type="submit"  value="Enviar" >
            </form>
        </div>
    </div>
@endsection