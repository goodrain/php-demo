<?php
function memcache_connect($host, $port)
{
    $memcache = new Memcache;
    $memcache->connect($host, $port);
    return $memcache;
}
try {
    session_id("19216821213c65cedec65b0883238c278eeb573e077");
    session_start();
    if (!isset($_SESSION['session_time'])) {   
        $_SESSION['session_time'] = time();
    }
    $memcache = memcache_connect($_ENV['MEMCACHED_HOST'], $_ENV['MEMCACHED_PORT']);  
    $memcache->set('memcache', 'hello memcache');  
    $session_info = $memcache->get('19216821213c65cedec65b0883238c278eeb573e077');
    $memcache_info =$memcache->get('memcache');
}catch(Exception $e) {
    $memcache_info = $e;
    $session_info = "";
}   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP-Demo 在Rainbond源码构建应用</title>

    <meta name="description"
        content="Rainbond（云帮）是一款以应用为中心的开源PaaS，深度整合基于Kubernetes的容器管理、Service Mesh微服务架构最佳实践、多类型CI/CD应用构建与交付、多数据中心资源管理等技术，为用户提供云原生应用全生命周期解决方案，构建应用与基础设施、应用与应用、基础设施与基础设施之间互联互通的生态体系，满足支撑业务高速发展所需的敏捷开发、高效运维和精益管理需求。" />

    <meta name="author" content="goodrain" />

    <meta property="og:title" content="Rainbond Static Demo" />
    <meta property="og:description"
        content="Rainbond（云帮）是一款以应用为中心的开源PaaS，深度整合基于Kubernetes的容器管理、Service Mesh微服务架构最佳实践、多类型CI/CD应用构建与交付、多数据中心资源管理等技术，为用户提供云原生应用全生命周期解决方案，构建应用与基础设施、应用与应用、基础设施与基础设施之间互联互通的生态体系，满足支撑业务高速发展所需的敏捷开发、高效运维和精益管理需求。" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:updated_time" content="2017-03-02T21:56:55&#43;01:00" />
    <link rel="canonical" href="/" />

    <link href="./static/css/font.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/kube.min.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/kube.legenda.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/highlight.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/master.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/kube.demo.css" rel="stylesheet" type="text/css" />

    <link href="./static/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="./static/css/jquery.jsonview.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="show-sm">
            <div id="nav-toggle-box">
                <div id="nav-toggle-brand">
                    <a href="https://www.rainbond.com" target="_blank">Rainbond</a>
                </div>
                <a data-component="toggleme" data-target="#top" href="#" id="nav-toggle"><i class="kube-menu"></i></a>
            </div>
        </div>
        <div class="hide-sm" id="top">
            <div id="top-brand">
                <a href="https://www.rainbond.com" target="_blank" title="home">Rainbond</a>
            </div>
            <nav id="top-nav-main">
                <ul>
                    <li>
                        <a href="/" target="_blank">首页</a>
                    </li>
                    <li>
                        <a href="https://github.com/goodrain/php-demo" target="_blank">Github</a>
                    </li>

                    <li>
                        <a href="https://www.rainbond.com/docs/stable/user-manual/app-creation/language-support/php.html"
                            target="_blank">PHP语言支持文档</a>
                    </li>
                    <li>
                        <a href="./mysqldemo.php" target="_blank">连接Mysql</a>
                    </li>
                    <li>
                        <a href="./memcache.php" target="_blank">连接Memcache</a>
                    </li>
                </ul>
            </nav>
            <nav id="top-nav-extra">
                <ul>
                    <li>
                        <a href="https://console.goodrain.com" target="_blank">试用公有云</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div id="main">
            <table>
                <tr>
                    <td>MEMCACHED_HOST</td>
                    <td><?php echo $_ENV['MEMCACHED_HOST'] ?></td>
                </tr>
                <tr>
                    <td>MEMCACHED_PORT</td>
                    <td><?php echo $_ENV['MEMCACHED_PORT'] ?></td>
                </tr>
                <tr>
                    <td>session_time</td>
                    <td><?php echo date("Y-m-d h:i:s",$_SESSION['session_time']) ?></td>
                </tr>
                <tr>
                    <td>nowtime</td>
                    <td><?php echo date("Y-m-d h:i:s",time()) ?></td>
                </tr>
                <tr>
                    <td>session_info</td>
                    <td><?php echo $session_info ?></td>
                </tr>
                <tr>
                    <td>从memcache取值</td>
                    <td><?php echo $memcache_info ?> </td>
                </tr>
            </table>
            <div>
    </main>
    <footer>
        <footer id="footer">
            <nav>
                <ul>
                    <li><a href="https://github.com/goodrain/rainbond"><span>Rainbond Github</span></a></li>
                </ul>
            </nav>
            <p>&copy; Licence Apache.</p>
        </footer>
    </footer>
    <script type="text/javascript" src="./static/js/tocbot.min.js"></script>
    <script src="./static/js/kube.js" type="text/javascript"></script>
    <script src="./static/js/master.js" type="text/javascript"></script>
</body>

</html>