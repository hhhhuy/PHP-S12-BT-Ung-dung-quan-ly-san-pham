<h2>Cập nhật thông tin sản phẩm</h2>
<form method="post" action="./index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $product->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" value="<?php echo $product->price; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" value ="<?php echo $product->description; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Producer</label>
        <input name="producer" name="producer" value ="<?php echo $product->producer; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>