<?php


namespace mvcdeploy\layout;


class HtmlDoc implements IDoc
{
    private $html_content;
    private $css_file;
    private $page_title;
    private $lang;

    public function __construct(string $lang, string $page_title = null, string $html_content = null, string $css_file_location = null)
    {
        $this->lang = $lang;
        if (isset($page_title)) $this->setPageTitle($page_title);
        if (isset($html_content)) $this->addHtmlContent($html_content);
        if (isset($css_file_location)) $this->addCssFile($css_file_location);
    }

    public function addHtmlContent(string $content)
    {
        $this->html_content .= $content;
    }

    public function addCssFile(string $file_location)
    {
        $this->css_file .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$file_location\">";
    }

    public function setPageTitle(string $title)
    {
        $this->page_title = $title;
    }

    public function generatedDoc(): string
    {
        return <<<end
<!DOCTYPE html>
<html lang="$this->lang">
<head>
    <meta charset="UTF-8">
    $this->css_file
    <title>$this->page_title</title>
</head>
<body>
    $this->html_content
</body>
</html>
end;
    }
}