<form class="form-group col-md-5 pull-right" action="/payoutcheck" method="post">

    {{ Csrf_field() }}

    <input class="form-control" type="text" name="username" value="" placeholder="Enter Username without @ to view for other users">

    <button class="btn btn-primary pull-right" type="submit" value="ok" name="check"> Go </button>

</form>
