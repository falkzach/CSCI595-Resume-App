@extends('layouts.app')

@section('content')
<div>
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12"> Current Field </h3>
</div>

<div class="container-fluid">
  <div class="column1">
    <div class="col-sm-4-resume2">
      <div class="panel panel-info"> <div class="panel-heading"> <a class="X"> X </a> </div> </div>

      <div class="container-fluid" id="build-info-static" style="display:initial">
        <dl>
          <dt>Information:&nbsp;</dt>
          <dd><span id="info_static">info</span></dd>
        </dl>
        <button class="btn build-button"> Edit </button>
      </div>

    </div>
  </div>

  <div class="column2">
    <div class="col-sm-4-resume2">
      <div class="center">
        <div class="panel panel-info"> <div class="panel-heading"> Add Items </div> </div>
        <form>
          <dl>
            <dt><label for="info_input">Info:</label></dt>
            <dd><input type="text" name="info" id="info_input" value=""/></dd>
          </dl>
          <br>
          <button class="btn submit-button"> Add </button>
        </form>
      </div>
    </div>
  </div>

</div>

</div>
@endsection

@section('javascript')
<script>
    // changes from displaying build information to editing build information
    // build object used to return build information from ajax calls
    // TODO: implement change password
    var build = {
        CSRF_TOKEN: undefined,
        id: NaN,
        info: '',
        init: function() {
            build.CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            build.getInfo();

            $(".build-button").click(function(){
                $("#build-info-static").css('display','none');
                $("#build-info-edit").css('display','initial');
            });

            $(".submit-button").click(function(e){
              console.log(e);
                e.preventDefault();
                build.updateUser();
                $("#build-info-static").css('display','initial');
                $("#build-info-edit").css('display','none');
            });
        },
        getInfo: function() {
            $.ajax({
                url: 'http://localhost:8000/api/school/',
                data: {_token: build.CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                  console.log(data);
                    build.updatePage(data);
                }
            });
        },
        updateUser: function() {
            var data = {
                _token: build.CSRF_TOKEN,
                info: $('#info_input').val(),
            };
            console.log(data);

            $.ajax({
                type: "POST",
                url: '/api/school/update/2',
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    build.updatePage(data);
                }
            });
        },

        //updates values on build page
        updatePage: function(data) {
            console.log(data);
            build.id = data['user']['id'];
            build.info = data['user']['info'];
            $('#info_static').text(build.info);
            $('#info_input').val(build.info);
        }
    };

    $(function() {
        build.init();
    });

</script>
@endsection
