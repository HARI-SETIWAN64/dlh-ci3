<?php

/* database/designer/canvas.twig */
class __TwigTemplate_72aa567f147ae835602b3628335482e894e9b7dc64bdccb2251fac4ce56b4206 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"osn_tab\">
    <canvas class=\"designer\" id=\"canvas\" width=\"100\" height=\"100\"></canvas>
</div>
";
    }

    public function getTemplateName()
    {
        return "database/designer/canvas.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "database/designer/canvas.twig", "C:\\xampp\\phpMyAdmin\\templates\\database\\designer\\canvas.twig");
    }
}
