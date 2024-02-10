<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
htmlTop();
routes($url);
htmlBottom();


function routes($url)
{
    switch ($url) {
        case '/':
            $controller = new HomeController();
            break;

        case '/home':
            $controller = new HomeController();
            break;

        case '/about':
            $controller = new AboutController();
            break;

        case '/product':
            $controller = new ProductsController();
            break;
    }

    $controller->run();
}

function htmlTop()
{ ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body>
        <main class="container">
            <header>
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">about</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        <?php }

function htmlBottom()
{ ?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
    </body>

    </html>
<?php }
class HomeController
{
    public function run()
    {

        $productRepository = new ProductRepository();
        $products = $productRepository->getAll();

        $this->data['title'] = 'Página Inicial';
        $this->data['products'] = $products;

        $this->view($this->data);
    }

    public function view($data)
    {
        homePage($data);
    }
}

class ProductController
{
    public function run()
    {
        $id = 1;
        $productRepository = new ProductRepository();
        $product = $productRepository->getByKey($id);

        $this->data['title'] = 'Página Inicial';
        $this->data['product'] = $product;

        $this->view($this->data);
    }

    public function view($data)
    {
        productPage($data);
    }
}
function homePage($data)
{
    $products = $data['products'];
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1>
        <?= $title ?>
    </h1>
    <table class="table">
        <tr>
            <th>ID***</th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>

        <?php foreach ($products as $item) { ?>

            <tr>
                <td>
                    <?= $item->id ?>
                </td>
                <td>
                    <?= $item->name ?>
                </td>
                <td>R$
                    <?= $item->price ?>
                </td>
                <td><a href="/product/<?= $item->id ?>" class="btn btn-primary">ver</a></td>
            </tr>

        <?php } ?>

    </table>

<?php }

function productPage($data)
{
    $product = $data['product'];
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1>
        <?= $title ?>
    </h1>

    <form>
        <input type="hidden" value=<?= $product->id ?> id="product-id" name="product-id">

        <div class="mb-3">
            <label for="product-name" class="form-label">nome do produto</label>
            <input type="text" class="form-control" id="product-name" name="product-name" value="<?= $product->name ?>">
        </div>
        <div class="mb-3">
            <label for="product-price" class="form-label">preço R$</label>
            <input type="text" class="form-control" id="product-price" name="product-price" value="<?= $product->price ?>">
        </div>

        <button type="button" class="btn btn-primary">salvar</button>
        <a href="/home" type="button" class="btn btn-primary">retornar</a>
    </form>

<?php }

function aboutPage($data)
{
    $title = $data['title'];

    breadcrumps($title);
    ?>

    <h1>
        <?= $title ?>
    </h1>

    <p>
        conteúdo da página
    </p>

<?php }
function breadcrumps($title)
{ ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?= $title ?>
            </li>
        </ol>
    </nav>

<?php }
interface IRepositories
{
    public function getAll();
    public function getByKey($key);
    public function add($data);
    public function update($key, $data);
    public function delete($key);
}


abstract class Repositories implements IRepositories
{
    protected $apiUrl;

    public function __construct($baseUrl, $tableName)
    {
        $this->apiUrl = $baseUrl . $tableName;
    }

    protected function fetchData($url, $method = 'GET', $data = null)
    {
        $options = [
            'http' => [
                'method' => $method,
                'header' => 'Content-type: application/json',
                'content' => $data ? json_encode($data) : null,
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result ? json_decode($result, true) : null;
    }

    public function getAll()
    {
        return $this->fetchData($this->apiUrl);
    }

    public function getByKey($key)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url);
    }

    public function add($data)
    {
        return $this->fetchData($this->apiUrl, 'POST', $data);
    }

    public function update($key, $data)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url, 'PUT', $data);
    }

    public function delete($key)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url, 'DELETE');
    }
}

class CategoryRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('http://localhost:3000/', 'categories');
    }
}

class ProductRepository extends Repositories
{
    public function __construct()
    {
        parent::__construct('http://localhost:3000/', 'products');
    }
}

?>