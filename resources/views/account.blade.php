@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
  <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Your Account <button class="account-button"> Edit Account Info </button></h3>
</div>

<div class="container-fluid">
  <div class="container-fluid" id="account-info-static" style="display:initial">
    <table>
      <tr>
        <td align="left">Username:&nbsp;</td>
        <td align="left"><span id="username_static">username</span></td>
      </tr>
      <tr>
        <td align="left">Name:&nbsp;</td>
        <td align="left"><span id="name_static">name</span></td>
      </tr>
      <tr>
        <td align="left">Email:&nbsp;</td>
        <td align="left"><span id="email_static">email</span></td>
      </tr>
      <tr>
        <td align="left">Telephone:&nbsp;</td>
        <td align="left"><span id="telephone_static">telephone</span></td>
      </tr>
      <tr>
        <td align="left">Address:&nbsp;</td>
        <td align="left"><span id="address_static">address</span></td>
      </tr>
    </table>
  </div>
  <div class="container-fluid" id="account-info-edit" style="display:none">
    <form>
      <table>
        <tr>
          <td align="left">Username:&nbsp;</td>                                     <!-- CHANGE DEFAULT VALUES starting here -->
          <td align="left"><input type="text" name="username" id="username_input" value=""/></td>
        </tr>
        <tr>
          <td align="left">Name:&nbsp;</td>
          <td align="left"><input type="text" name="name" id="name_input" value=""/></td>
        </tr>
        <tr>
          <td align="left">Email:&nbsp;</td>
          <td align="left"><input type="text" name="email" id="email_input" value=""/></td>
        </tr>
        <tr>
          <td align="left">Telephone:&nbsp;</td>
          <td align="left"><input type="text" name="telephone" id="telephone_input" value=""/></td>
        </tr>
        <tr>
          <td align="left">Address:&nbsp;</td>
          <td align="left"><input type="text" name="address" id="address_input" value=""/></td>  <!-- CHANGE DEFAULT VALUES ending here -->
        </tr>
      </table>
      <br>
      <button class="submit-button"> Submit Changes </button>
    </form>
  </div>
</div>

</div>
<script>
    // changes from displaying account information to editing account information
    $(".account-button").click(function(){
      $("#account-info-static").css('display','none');
      $("#account-info-edit").css('display','initial');
      $(".account-button").css('display','none');
    });

    // TODO: submit changes to backend
    $(".submit-button").click(function(e){
        e.preventDefault();
    });

    // account object used to return account information from ajax calls
    // TODO: implement ajax calls
    var account = {
        username: function() {
          return 'janeD';
        },
        name: function() {
          return 'Jane Doe';
        },
        email: function() {
          return 'janedoe@gmail.com';
        },
        telephone: function() {
          return '406-555-0099';
        },
        address: function() {
          return '55 Lois Lane Missoula, MT 59801';
        },


        // updates values on account page
        updatePage: function() {
            $('#username_static').text(account.username());
            $('#name_static').text(account.name());
            $('#email_static').text(account.email());
            $('#telephone_static').text(account.telephone());
            $('#address_static').text(account.address());

            $('#username_input').val(account.username());
            $('#name_input').val(account.name());
            $('#email_input').val(account.email());
            $('#telephone_input').val(account.telephone());
            $('#address_input').val(account.address());
        }
    }

    account.updatePage()
</script>
@endsection
