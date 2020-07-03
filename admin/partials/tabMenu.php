 <div class="wrap">
    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="first">First</a>
        <a class="item" data-tab="second">Second</a>
        <a class="item" data-tab="third">Third</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="first">
        <?php echo do_shortcode('[desharioForm]'); ?>
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        Second
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
        <form class="ui form userForm">
            <div class="field">
                <label>Username</label>
                <input type="text" id="username">
            </div>
            <button type="button" class="ui button" onclick="userFormSubmit()">Submit</button>
        </form>
    </div>
</div>

