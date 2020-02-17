<form action="<?php echo home_url( );?>" id="search-form">
    <div class="input-group">
        <input type="search" id="search-form-input" class="form-control" name="s" placeholder="Rechercher des articles" value="<?php echo get_search_query( ); ?>" autocomplete="off">
        <div class="input-group-append">
            <button type="submit" class="input-group-text">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>