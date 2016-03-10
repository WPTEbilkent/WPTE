<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container">
    <div class="title">Application Managers</div>

    @can('edit_topic')
    <a href="">Edit the topic</a>
    @endcan

    @can('delete_topic')
    <a href="">Delete topic</a>
    @endcan

</div>
</body>
</html>