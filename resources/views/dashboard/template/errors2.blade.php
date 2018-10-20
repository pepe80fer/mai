<div class="alert alert-danger errors-alert" role="alert" style="padding-left:20px; display:none;">
    <h6 class="alert-heading">@yield('errorMessage','Error')</h6>
    <hr>
    <ul>
        <li>@{{ errors.message }}</li>
        <li v-for="error in errors.errors">@{{ error }}</li>
    </ul>
</div>