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

/* themes/custom/cats_subtheme/templates/page.html.twig */
class __TwigTemplate_a840160c4319bd1d4a6124a4469bdde82fc3ca834aa7038f93696058d1d1ee34 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'navbar' => [$this, 'block_navbar'],
            'main' => [$this, 'block_main'],
            'header' => [$this, 'block_header'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'highlighted' => [$this, 'block_highlighted'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        $context["container"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 54), "fluid_container", [], "any", false, false, true, 54)) ? ("container-fluid") : ("container"));
        // line 56
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 56) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 56))) {
            // line 57
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 97
        echo "
";
        // line 99
        $this->displayBlock('main', $context, $blocks);
        // line 164
        echo "
";
        // line 165
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 165)) {
            // line 166
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 57
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "    ";
        // line 59
        $context["navbar_classes"] = [0 => "navbar", 1 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 61
($context["theme"] ?? null), "settings", [], "any", false, false, true, 61), "navbar_inverse", [], "any", false, false, true, 61)) ? ("navbar-inverse") : ("navbar-default")), 2 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 62
($context["theme"] ?? null), "settings", [], "any", false, false, true, 62), "navbar_position", [], "any", false, false, true, 62)) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 62), "navbar_position", [], "any", false, false, true, 62), 62, $this->source)))) : (($context["container"] ?? null)))];
        // line 65
        echo "    <header";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "addClass", [0 => ($context["navbar_classes"] ?? null)], "method", false, false, true, 65), 65, $this->source), "html", null, true);
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 66
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 66)) {
            // line 67
            echo "        <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 67, $this->source), "html", null, true);
            echo "\">
      ";
        }
        // line 69
        echo "          <div id=\"navbar-unit\" class=\"navbar-unity\">
            ";
        // line 70
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 70)) {
            // line 71
            echo "              <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
                <span class=\"sr-only\">";
            // line 72
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
            echo "</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
              </button>
            ";
        }
        // line 78
        echo "            <div class=\"navbar-header\">
              ";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
        echo "
              ";
        // line 81
        echo "
            </div>

            ";
        // line 85
        echo "            ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 85)) {
            // line 86
            echo "              <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
                ";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
            echo "
              </div>
            ";
        }
        // line 90
        echo "            ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 90)) {
            // line 91
            echo "          </div>
            ";
        }
        // line 93
        echo "        </div>
    </header>
  ";
    }

    // line 99
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 100
        echo "  <div role=\"main\" class=\"main-container ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 100, $this->source), "html", null, true);
        echo " js-quickedit-main-content\">
    <div class=\"row\">

      ";
        // line 104
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 104)) {
            // line 105
            echo "        ";
            $this->displayBlock('header', $context, $blocks);
            // line 110
            echo "      ";
        }
        // line 111
        echo "
      ";
        // line 113
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 113)) {
            // line 114
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 119
            echo "      ";
        }
        // line 120
        echo "
      ";
        // line 122
        echo "      ";
        // line 123
        $context["content_classes"] = [0 => (((twig_get_attribute($this->env, $this->source,         // line 124
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 124) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 124))) ? ("col-sm-6") : ("")), 1 => (((twig_get_attribute($this->env, $this->source,         // line 125
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 125) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 125)))) ? ("col-sm-9") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,         // line 126
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 126) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 126)))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 127
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 127)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 127)))) ? ("col-sm-12") : (""))];
        // line 130
        echo "      <section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 130), 130, $this->source), "html", null, true);
        echo ">

        ";
        // line 133
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 133)) {
            // line 134
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 137
            echo "        ";
        }
        // line 138
        echo "
        ";
        // line 140
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 140)) {
            // line 141
            echo "          ";
            $this->displayBlock('help', $context, $blocks);
            // line 144
            echo "        ";
        }
        // line 145
        echo "
        ";
        // line 147
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 151
        echo "      </section>

      ";
        // line 154
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 154)) {
            // line 155
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 160
            echo "      ";
        }
        // line 161
        echo "    </div>
  </div>
";
    }

    // line 105
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 106
        echo "          <div class=\"col-sm-12\" role=\"heading\">
            ";
        // line 107
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 107), 107, $this->source), "html", null, true);
        echo "
          </div>
        ";
    }

    // line 114
    public function block_sidebar_first($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 115
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 116
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 134
    public function block_highlighted($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 135
        echo "            <div class=\"highlighted\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 135), 135, $this->source), "html", null, true);
        echo "</div>
          ";
    }

    // line 141
    public function block_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 142
        echo "            ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 142), 142, $this->source), "html", null, true);
        echo "
          ";
    }

    // line 147
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 148
        echo "          <a id=\"main-content\"></a>
          ";
        // line 149
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 149), 149, $this->source), "html", null, true);
        echo "
        ";
    }

    // line 155
    public function block_sidebar_second($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 156
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 157
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 157), 157, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 166
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 167
        echo "    <div class=\"footer-wrapper\">
      <footer class=\"footer container ";
        // line 168
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 168, $this->source), "html", null, true);
        echo "\" role=\"contentinfo\">
        ";
        // line 169
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 169), 169, $this->source), "html", null, true);
        echo "
      </footer>
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/cats_subtheme/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 169,  328 => 168,  325 => 167,  321 => 166,  314 => 157,  311 => 156,  307 => 155,  301 => 149,  298 => 148,  294 => 147,  287 => 142,  283 => 141,  276 => 135,  272 => 134,  265 => 116,  262 => 115,  258 => 114,  251 => 107,  248 => 106,  244 => 105,  238 => 161,  235 => 160,  232 => 155,  229 => 154,  225 => 151,  222 => 147,  219 => 145,  216 => 144,  213 => 141,  210 => 140,  207 => 138,  204 => 137,  201 => 134,  198 => 133,  192 => 130,  190 => 127,  189 => 126,  188 => 125,  187 => 124,  186 => 123,  184 => 122,  181 => 120,  178 => 119,  175 => 114,  172 => 113,  169 => 111,  166 => 110,  163 => 105,  160 => 104,  153 => 100,  149 => 99,  143 => 93,  139 => 91,  136 => 90,  130 => 87,  127 => 86,  124 => 85,  119 => 81,  115 => 79,  112 => 78,  103 => 72,  100 => 71,  98 => 70,  95 => 69,  89 => 67,  87 => 66,  82 => 65,  80 => 62,  79 => 61,  78 => 59,  76 => 58,  72 => 57,  66 => 166,  64 => 165,  61 => 164,  59 => 99,  56 => 97,  52 => 57,  50 => 56,  48 => 54,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - title_prefix: Additional output populated by modules, intended to be
 *   displayed in front of the main title tag that appears in the template.
 * - title: The page title, for use in the actual content.
 * - title_suffix: Additional output populated by modules, intended to be
 *   displayed after the main title tag that appears in the template.
 * - messages: Status and error messages. Should be displayed prominently.
 * - tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.navigation: Items for the navigation region.
 * - page.navigation_collapsible: Items for the navigation (collapsible) region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 *
 * @ingroup templates
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
{% set container = theme.settings.fluid_container ? 'container-fluid' : 'container' %}
{# Navbar #}
{% if page.navigation or page.navigation_collapsible %}
  {% block navbar %}
    {%
      set navbar_classes = [
        'navbar',
        theme.settings.navbar_inverse ? 'navbar-inverse' : 'navbar-default',
        theme.settings.navbar_position ? 'navbar-' ~ theme.settings.navbar_position|clean_class : container,
      ]
    %}
    <header{{ navbar_attributes.addClass(navbar_classes) }} id=\"navbar\" role=\"banner\">
      {% if not navbar_attributes.hasClass(container) %}
        <div class=\"{{ container }}\">
      {% endif %}
          <div id=\"navbar-unit\" class=\"navbar-unity\">
            {% if page.navigation_collapsible %}
              <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
                <span class=\"sr-only\">{{ 'Toggle navigation'|t }}</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
              </button>
            {% endif %}
            <div class=\"navbar-header\">
              {{ page.navigation }}
              {# .btn-navbar is used as the toggle for collapsed navbar content #}

            </div>

            {# Navigation (collapsible) #}
            {% if page.navigation_collapsible %}
              <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
                {{ page.navigation_collapsible }}
              </div>
            {% endif %}
            {% if not navbar_attributes.hasClass(container) %}
          </div>
            {% endif %}
        </div>
    </header>
  {% endblock %}
{% endif %}

{# Main #}
{% block main %}
  <div role=\"main\" class=\"main-container {{ container }} js-quickedit-main-content\">
    <div class=\"row\">

      {# Header #}
      {% if page.header %}
        {% block header %}
          <div class=\"col-sm-12\" role=\"heading\">
            {{ page.header }}
          </div>
        {% endblock %}
      {% endif %}

      {# Sidebar First #}
      {% if page.sidebar_first %}
        {% block sidebar_first %}
          <aside class=\"col-sm-3\" role=\"complementary\">
            {{ page.sidebar_first }}
          </aside>
        {% endblock %}
      {% endif %}

      {# Content #}
      {%
        set content_classes = [
          page.sidebar_first and page.sidebar_second ? 'col-sm-6',
          page.sidebar_first and page.sidebar_second is empty ? 'col-sm-9',
          page.sidebar_second and page.sidebar_first is empty ? 'col-sm-9',
          page.sidebar_first is empty and page.sidebar_second is empty ? 'col-sm-12'
        ]
      %}
      <section{{ content_attributes.addClass(content_classes) }}>

        {# Highlighted #}
        {% if page.highlighted %}
          {% block highlighted %}
            <div class=\"highlighted\">{{ page.highlighted }}</div>
          {% endblock %}
        {% endif %}

        {# Help #}
        {% if page.help %}
          {% block help %}
            {{ page.help }}
          {% endblock %}
        {% endif %}

        {# Content #}
        {% block content %}
          <a id=\"main-content\"></a>
          {{ page.content }}
        {% endblock %}
      </section>

      {# Sidebar Second #}
      {% if page.sidebar_second %}
        {% block sidebar_second %}
          <aside class=\"col-sm-3\" role=\"complementary\">
            {{ page.sidebar_second }}
          </aside>
        {% endblock %}
      {% endif %}
    </div>
  </div>
{% endblock %}

{% if page.footer %}
  {% block footer %}
    <div class=\"footer-wrapper\">
      <footer class=\"footer container {{ container }}\" role=\"contentinfo\">
        {{ page.footer }}
      </footer>
    </div>
  {% endblock %}
{% endif %}
", "themes/custom/cats_subtheme/templates/page.html.twig", "/var/www/web/themes/custom/cats_subtheme/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 54, "if" => 56, "block" => 57);
        static $filters = array("clean_class" => 62, "escape" => 65, "t" => 72);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
