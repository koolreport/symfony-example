# How to integrate KoolReport into Symfony?

KoolReport is an open-source PHP Reporting Framework for faster and easier report delivery. KoolReport works well with any MVC frameworks and Symfony is one of them. In this repository, we would like to guide you to integrate KoolReport into Symfony.

# Guide

## Install KoolReport

Adding `koolreport/core` into your `composer.json`

```
{
    "requires"=>{
        ...
        "koolreport/core":"*"
    }
}
```

and run

```
composer update
```

Now KoolReport is available in your Symfony application.

## Create your report

1. Under `src` folder, you create folder `Reports` to hold reports
2. Inside `Reports` folder, you create `MyReport.php` and `MyReport.view.php`, please view our code in above repository.
3. Make the `MyReport` class under namespace `App\Reports`

## Render report

Now in your controller's action, you can render report like this:

```
    /**
    * @Route("/site/report")
    */
    public function report()
    {
        $report =  new \App\Reports\MyReport;
        return new Response($report->run()->render());
    }
```

or if you want to render report inside twig template you can do:

```
    /**
    * @Route("/site/reportwithtemplate")
    */
    public function template()
    {
        $report =  new \App\Reports\MyReport;
        return $this->render('report.html.twig', [
            'myreport' =>$report->run()->render(true)
        ]);
    }
```

and here is the content of your twig template:


```
<html>
    <head>
        <title>Render KoolReport inside Twig Template</title>
    </head>
    <body>
        <h1>Render KoolReport inside Twig Template</h1>
        {{myreport|raw}}
    </body>
</html>
```

Now if you run

```
http://localhost:8000/site/report
```

or 

```
http://localhost:8000/site/reportwithtemplate
```

you will see your report!

# Summary

In this tutorial, we have shown how to use KoolReport inside Symfony web application. You can render report directly or use wit twig template. Hope that this tutorial helps you to get started faster with KoolReport.

__Happy reporting!__