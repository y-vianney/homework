<style>
    :root
    {
        --point-colour: #000;
    }

    .header
    {
        height: auto;
        background: #fff;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .top
    {
        padding: 15px 0 15px 10px;
        width: 65%;
        display: flex;
        justify-content: space-between;
    }
    .nav-bar
    {
        width: 65%;
        padding: 0 0 10px 0;
        display: none;
    }
    ul
    {
        display: flex;
        list-style: none;
    }
    .nav-bar ul li a
    {
        text-decoration: none;
        color: #000;
        margin-left: 25px;
        font-size: 15px;
        font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        position: relative;
    }
    .nav-bar ul li a::before
    {
        content: "";
        background-color: #000;
        height: 3px;
        width: 0;
        border-radius: 10px;
        position: absolute;
        bottom: -3px;
        transition: all .3s ease-out;
    }
    .nav-bar ul li a:hover:before
    {
        width: 100%;
    }
    .logo
    {
        border: 1px solid #000;
        background-color: #000;
        color: #fff;
        border-radius: 2px;
        padding: 2px;
        font-family: Tahoma, sans-serif;
    }
    .burger-menu
    {
        margin-top: 3px;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        cursor: pointer;
    }
    .burger-menu .row
    {
        height: calc(100% / 3);
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center
    }
    .burger-menu .row .point
    {
        height: 3px;
        width: 3px;
        border-radius: 100%;
        background-color: var(--point-colour);
    }
</style>
<div class="header">
    <div class="top">
        <div class="logo">AyA</div>
        <span class="burger-menu">
            <span class="row">
                <span class="point"></span>
                <span class="point"></span>
                <span class="point"></span>
            </span>
            <span class="row">
                <span class="point"></span>
                <span class="point"></span>
                <span class="point"></span>
            </span>
            <span class="row">
                <span class="point"></span>
                <span class="point"></span>
                <span class="point"></span>
            </span>
        </span>
    </div>
    <div class="nav-bar">
        <ul>
            <li><a href="http://localhost:8888/tests/homework/home.php">Home</a></li>
            <li><a href="http://localhost:8888/tests/homework/sub.php">Clients</a></li>
            <li><a href="http://localhost:8888/tests/homework/product.php">Produits</a></li>
            <li><a href="http://localhost:8888/tests/homework/sub.php">Commandes</a></li>
        </ul>
    </div>
</div>
<script>
    let i = 1;
    document.getElementsByClassName('burger-menu')[0].addEventListener('click', (e) => {
        if (i % 2 ==0)
        {
            document.getElementsByClassName('nav-bar')[0].style.display = 'none';
        } else {
            document.getElementsByClassName('nav-bar')[0].style.display = 'block';
        }
        i++;
    })
</script>