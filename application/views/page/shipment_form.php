<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src='<?=base_url('assets/js/jquery-1.10.2.js');?>' type='text/javascript'></script>
    </head>
    <body>
        <hr />
        <form method="post" action="">
            <div>
                Item Weight (kg) : <input type="text" name="item_weight" id="item_weight" />
            </div>
            <div>
                Item Length (cm) : <input type="text" name="item_length" id="item_length" />
            </div>
            <div>
                Item Width (cm) : <input type="text" name="item_width" id="item_width" />
            </div>
            <div>
                Item Height (cm) : <input type="text" name="item_height" id="item_height" />
            </div>
            <div>
                <button type="submit" name="compute">Submit</button>
            </div>
        </form>
    </body>
</html>
