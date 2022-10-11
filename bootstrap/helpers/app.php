<?php
$app = new \Core\Framework();
/**
 * @throws Exception
 */
function view($view, $params = []): bool
{
    global $app;
    return $app->render($view, $params);
}