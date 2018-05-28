<section class="col-md-9">

    <form class="form-group" action="/ask-a-question" method="post">

      {{ csrf_field() }}

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control input-title" name="title" value="" placeholder="Title of a question should not be too long">
        </div>

        <div class="form-group">
            <label for="">Body</label>
            <textarea name="body" rows="20" cols="80" class="form-control input-body"></textarea>
        </div>

        <div class="form-group">
            <label for="">Tags</label>
            <input type="text" class="form-control input-title" name="tags" value="" placeholder="Tags must be separated with comma. example: life,sports,steemit">
        </div>

        <button type="submit" class="btn btn-primary pull-right" name="button">Publish Question</button>

    </form>

</section>
