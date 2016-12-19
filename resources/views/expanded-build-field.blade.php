@extends('layouts.app')

@section('content')
<div>
  <div class="w3-container w3-padding-32" id="projects">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Build Your Résumé </h3>
  </div>

  <div class="select">
    <select>
      <option> -- Select Field to Edit -- </option>
      <option value="ed"> Education History </option>
      <option value="work"> Work History </option>
      <option value="ref"> References </option>
    </select>
  </div>

  <div class="container-fluid">
    <div id="account-info-static" style="display:initial">
      <dl>
        <dt id="field">Info:&nbsp;</dt>
        <dd><span id="name_static" style="display:none"> name </span></dd>
      </dl>
      <button id="edit_button" class="btn build-button" style="display:none"> Edit Info </button>
    </div>

    <div id="account-info-edit" style="display:none">
      <form>
        <dl>
          <dt><label id="field2" for="name_input"> Info: </label></dt>
          <dd><input type="text" name="name" id="name_input" value=""/></dd>
        </dl>
        <br>
        <button class="btn submit-button"> Submit Changes </button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
  var str = '';
  $("select")
  .change(function ()
  {
    $("select option:selected").each(function()
    {
      if ($(this).text() != " -- Select Field to Edit -- ")
      {
        str = $(this).text();
        $("#name_static").css('display','initial');
        $("#edit_button").css('display','initial');

        var account =
        {
          CSRF_TOKEN: undefined,
          id: NaN,
          name: '',
          init: function()
          {
            account.CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var path = "";
            if (str == " Education History ")
            {
              path = '/api/school';
            }
            if (str == " Work History ")
            {
              path = '/api/work';
            }
            if (str == " References ")
            {
              path = '/api/reference';
            }
            account.getUser(path);

            $(".build-button").click(function()
            {
              $("#account-info-static").css('display','none');
              $("#account-info-edit").css('display','initial');
            });

            $(".submit-button").click(function(e)
            {
              e.preventDefault();
              account.updateUser();
              $("#account-info-static").css('display','initial');
              $("#account-info-edit").css('display','none');
            });
          },

          getUser: function(path)
          {
            $.ajax({
              url: path,
              data: {_token: account.CSRF_TOKEN},
              dataType: 'JSON',
              success: function (data)
              {
                account.updatePage(data);
              }
            });
          },

          updateUser: function()
          {
            var data =
            {
              _token: account.CSRF_TOKEN,
              name: $('#name_input').val(),
            };

            $.ajax({
              type: "POST",
              url: '/api/account/update',
              data: data,
              dataType: 'JSON',
              success: function (data)
              {
                account.updatePage(data);
              }
            });
          },

          //updates values on account page
          updatePage: function(data)
          {
            $('#name_static').text("");
            if (str == " Education History ")
            {
              account.id = data['school']['id'];
              for (i = 0; i < data['school'].length; i++)
              {
      //          account.name += data['school'][i]['institution'] + "\n";
                $('#name_static').prepend($("<div>" + data['school'][i]['institution']  + "</div>"));
              }
            }
            if (str == " Work History ")
            {
              account.id = data['work']['id'];
              for (i = 0; i < data['work'].length; i++)
              {
        //        account.name += data['work'][i]['employer'] + "\n";
                $('#name_static').prepend($("<div>" + data['work'][i]['employer']  + "</div>"));
              }
            }
            if (str == " References ")
            {
              account.id = data['references']['id'];
              for (i = 0; i < data['references'].length; i++)
              {
                $('#name_static').prepend($("<div>" + data['references'][i]['name']  + "</div>" +
                                            "<div>" + data['references'][i]['email'] + "</div>" +
                                            "<div>" + data['references'][i]['phone'] + "</div>"));
                //$('#name_input').
              }
            }
            $('#name_input').val(account.name);
          }
        };

        $(function()
        {
          account.init();
        });
      }
    });
    $("#field").text(str);
    $("#field2").text(str);
  })
  .change();
</script>
@endsection
