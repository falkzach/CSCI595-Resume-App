@extends('layouts.app2')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Your Account </h3>
    <button class="btn account-button"> Edit Account Info </button>
</div>

<div class="container-fluid">
  <div class="container-fluid" id="account-info-static" style="display:initial">
    <dl>
        <dt>Name:&nbsp;</dt>
        <dd><span id="name_static">name</span></dd>

        <dt>Email:&nbsp;</dt>
        <dd><span id="email_static">email</span></dd>

        <dt>Telephone:&nbsp;</dt>
        <dd><span id="telephone_static">telephone</span></dd>

        <dt>Address:&nbsp;</dt>
        <d><span id="address_static">address</span></d>
    </dl>
  </div>
  <div class="container-fluid" id="account-info-edit" style="display:none">
    <form>
      <dl>
          <dt>Name:&nbsp;</dt>
          <dd><input type="text" name="name" id="name_input" value=""/></dd>

          <dt >Email:&nbsp;</dt>
          <dd><input type="text" name="email" id="email_input" value=""/></dd>

          <dt >Telephone:&nbsp;</dt>
          <dd><input type="text" name="telephone" id="telephone_input" value=""/></dd>

          <dt>Address:&nbsp;</dt>
          <dd><input type="text" name="address" id="address_input" value=""/></dd>  <!-- CHANGE DEFAULT VALUES ending here -->
      </dl>
      <br>
      <button class="submit-button"> Submit Changes </button>
    </form>
  </div>
</div>

</div>

@endsection

@section('javascript')
<script>
    // changes from displaying account information to editing account information
    // account object used to return account information from ajax calls
    // TODO: implement ajax calls
    var account = {
        CSRF_TOKEN: undefined,
        id: NaN,
        name: '',
        email: '',
        telephone: '',
        address: '',
        init: function() {
            account.CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            account.getUser();

            $(".account-button").click(function(){
                $("#account-info-static").css('display','none');
                $("#account-info-edit").css('display','initial');
                $(".account-button").css('display','none');
            });

            // TODO: submit changes to backend
            $(".submit-button").click(function(e){
                e.preventDefault();
            });
        },
        getUser: function() {
            $.ajax({
                url: '/api/account',
                data: {_token: account.CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    account.name = data['name'];
                    account.email = data['email'];
                    account.phone = data['phone'];
                    account.address = data['address'];
                    account.updatePage();
                }
            });
        },

//         updates values on account page
        updatePage: function() {
            $('#name_static').text(account.name);
            $('#email_static').text(account.email);
            $('#telephone_static').text(account.phone);
            $('#address_static').text(account.address);

            $('#name_input').val(account.name);
            $('#email_input').val(account.email);
            $('#telephone_input').val(account.phone);
            $('#address_input').val(account.address);
        }
    };

    $(function() {
        account.init();
    });

</script>
@endsection
