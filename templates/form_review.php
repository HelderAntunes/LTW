<form id="review_form" action="action_add_review.php" method="post">
    <input type="hidden" name="restaurant_id" value=<?=$_GET['id']?> >
    <label>Comment:
        <textarea rows="4" cols="50" name="comment"> </textarea>
    </label>
    <label>Score:
        <input type="number" name="score" value="3" min="1" max="5" step="1">
    </label>
    <button type="submit">Submit review</button>
</form>