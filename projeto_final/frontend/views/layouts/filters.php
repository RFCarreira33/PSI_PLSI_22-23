<?php
    use common\models\Categoria;
    use common\models\Marca;

    $categories = Categoria::find()->all();
    $brands = Marca::find()->all();
?>

<div>
    <select id="sort">
        <option data-filter="sort" value="nome-asc">Alfabeticamente ⬆</option>
        <option data-filter="sort" value="nome-desc">Alfabeticamente ⬇</option>
        <option data-filter="sort" value="preco-asc">Preço ⬆</option>
        <option data-filter="sort" value="preco-desc">Preço ⬇</option>
    </select>
</div>

<!-- generates the filters checkboxes. -->
<div>
    <h4>Stock</h4>
    <input type="checkbox" data-filter="stock" value="em_stock">Em Stock<br>
    <input type="checkbox" data-filter="stock" value="sem_stock">Sem Stock<br>

    <h4>Categorias</h4>
    <?php
        foreach($categories as $category)
        { ?>
            <input type="checkbox" data-filter="category" value="<?=str_replace(' ', '_', $category->nome)?>"><?=" " . $category->nome?><br>
        <?php
        }
    ?>
    
    <h4>Marcas</h4>
    <?php
        foreach($brands as $brand)
        { ?>
            <input type="checkbox" data-filter="brand" value="<?=str_replace(' ', '_', $brand->nome)?>"><?=" " . $brand->nome?><br>
        <?php
        }
    ?>
</div>

<script>
    /* It's a Proxy object that allows me to access the URL parameters as if they were properties of an
    object. */
    const params = new Proxy(new URLSearchParams(window.location.search), 
    {
        get: (searchParams, prop) => searchParams.get(prop),
    });

    var checkboxes = document.querySelectorAll("input[type=checkbox]");
    var sortOptions = document.getElementById("sort");

    /* It's a loop that iterates over all the checkboxes and adds an event listener to each one. The
    event listener is responsible for updating the URL parameters when the checkbox is checked or
    unchecked. */
    checkboxes.forEach(function(checkbox)
    {
        if(params[checkbox.getAttribute("data-filter")])
        {          
            var values = params[checkbox.getAttribute("data-filter")].split("-").map(value => value.toLowerCase());

            if(values.indexOf(checkbox.value.toLowerCase()) > -1)
            {
                checkbox.checked = true;
            }
        }

        checkbox.addEventListener('change', function() 
        {
            var filters = params[this.getAttribute("data-filter")];
            var newUrl = new URL(window.location.href);
            var newFilterQuery;

            if (this.checked) 
            {
                filters ? newFilterQuery = `${filters.toLowerCase()}-${this.value.toLowerCase()}` : newFilterQuery = `${this.value.toLowerCase()}`
                newUrl.searchParams.set(this.getAttribute("data-filter"), newFilterQuery);
            } 
            else 
            {
                newFilterQuery = filters.toLowerCase().replace(this.value.toLowerCase(), "").split("-").filter(n => n).join("-");
                newFilterQuery == "" ? newUrl.searchParams.delete(this.getAttribute("data-filter")) : newUrl.searchParams.set(this.getAttribute("data-filter"), newFilterQuery)
            }

            window.location.replace(newUrl);
        })
    }) 
    
    /* It's an event listener that updates the URL parameters when the user selects a different option
    from the dropdown menu. */
    sortOptions.addEventListener("change", function() 
    {
        var newUrl = new URL(window.location.href);

        newUrl.searchParams.set(this.options[this.selectedIndex].getAttribute("data-filter"), this.value);

        window.location.replace(newUrl);
    });

    /* It's a loop that iterates over all the options of the dropdown menu and selects the option that
    matches the value of the URL parameter. */
    if(params["sort"])
    {
        Array.from(sortOptions.options).forEach(function(option)
        {
            if(option.value == params["sort"].toLowerCase())
            {
                option.selected = true;
            }
        })
    }

    if(params["query"])
    {
        document.getElementById("searchBar").value = params["query"];
    }
</script>