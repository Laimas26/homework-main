<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* _partials/reading-mins.html.twig */
class __TwigTemplate_218871a89ed52be5b6c4d00aef8b8707 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/reading-mins.html.twig"));

        // line 1
        $context["count"] = 0;
        // line 2
        $context["allWords"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["article"]) || array_key_exists("article", $context) ? $context["article"] : (function () { throw new RuntimeError('Variable "article" does not exist.', 2, $this->source); })()), "text", [], "any", false, false, false, 2), " ");
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["allWords"]) || array_key_exists("allWords", $context) ? $context["allWords"] : (function () { throw new RuntimeError('Variable "allWords" does not exist.', 3, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["word"]) {
            // line 4
            echo "    ";
            if ((twig_length_filter($this->env, $context["word"]) > 3)) {
                // line 5
                echo "        ";
                $context["count"] = ((isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 5, $this->source); })()) + 1);
                // line 6
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['word'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        $context["minutesFloat"] = ((isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 8, $this->source); })()) / 200);
        // line 9
        $context["minutesInt"] = twig_round((isset($context["minutesFloat"]) || array_key_exists("minutesFloat", $context) ? $context["minutesFloat"] : (function () { throw new RuntimeError('Variable "minutesFloat" does not exist.', 9, $this->source); })()), 0, "floor");
        // line 10
        $context["seconds"] = twig_round((((isset($context["minutesFloat"]) || array_key_exists("minutesFloat", $context) ? $context["minutesFloat"] : (function () { throw new RuntimeError('Variable "minutesFloat" does not exist.', 10, $this->source); })()) - (isset($context["minutesInt"]) || array_key_exists("minutesInt", $context) ? $context["minutesInt"] : (function () { throw new RuntimeError('Variable "minutesInt" does not exist.', 10, $this->source); })())) * 60));
        // line 11
        echo twig_escape_filter($this->env, (isset($context["minutesInt"]) || array_key_exists("minutesInt", $context) ? $context["minutesInt"] : (function () { throw new RuntimeError('Variable "minutesInt" does not exist.', 11, $this->source); })()), "html", null, true);
        echo ":";
        echo twig_escape_filter($this->env, twig_sprintf("%02d", (isset($context["seconds"]) || array_key_exists("seconds", $context) ? $context["seconds"] : (function () { throw new RuntimeError('Variable "seconds" does not exist.', 11, $this->source); })())), "html", null, true);
        echo " mins";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "_partials/reading-mins.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 11,  65 => 10,  63 => 9,  61 => 8,  54 => 6,  51 => 5,  48 => 4,  44 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set count = 0 %}
{% set allWords = article.text|split(' ') %}
{% for word in allWords %}
    {% if word|length > 3 %}
        {% set count = count + 1 %}
    {% endif %}
{% endfor %}
{% set minutesFloat = count/200 %}
{% set minutesInt = minutesFloat|round(0, 'floor') %}
{% set seconds = ((minutesFloat-minutesInt)*60)|round %}
{{ minutesInt }}:{{ '%02d'|format(seconds) }} mins", "_partials/reading-mins.html.twig", "/code/templates/_partials/reading-mins.html.twig");
    }
}
