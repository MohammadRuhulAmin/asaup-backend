<h1>Notice Announcement</h1>
@foreach($allNotice as $notice)
    <div>
        <h3>Date: {{$notice->post_date}}</h3>
        <br>
        <?php echo $notice->post_description; ?>
        <br>
        <b>Post Auther {{$notice->posted_by}}</b>
    </div>
@endforeach
