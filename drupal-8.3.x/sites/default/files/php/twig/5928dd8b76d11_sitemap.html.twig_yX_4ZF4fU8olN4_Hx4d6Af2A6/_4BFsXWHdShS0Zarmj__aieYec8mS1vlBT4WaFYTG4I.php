<?php

/* modules/sitemap/templates/sitemap.html.twig */
class __TwigTemplate_3cf41ad4bb663798d34444c361175046c882f05a50a4c17f75c22caae6b3ae03 extends Twig_Template
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
        $tags = array("if" => 27, "for" => 34);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 25
        echo "
<div class=\"sitemap\">
  ";
        // line 27
        if ((isset($context["message"]) ? $context["message"] : null)) {
            // line 28
            echo "    <div class=\"sitemap-message\">
      ";
            // line 29
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 32
        echo "
  ";
        // line 33
        if ((isset($context["sitemap_items"]) ? $context["sitemap_items"] : null)) {
            // line 34
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sitemap_items"]) ? $context["sitemap_items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 35
                echo "      ";
                if ( !twig_test_empty($this->getAttribute($context["item"], "content", array()))) {
                    // line 36
                    echo "      <div";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => "sitemap-box"), "method"), "html", null, true));
                    echo ">
        ";
                    // line 37
                    if ($this->getAttribute($this->getAttribute($context["item"], "options", array()), "show_titles", array())) {
                        // line 38
                        echo "          <h2>";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true));
                        echo "</h2>
        ";
                    }
                    // line 40
                    echo "        <div class=\"content\">
          ";
                    // line 41
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true));
                    echo "
        </div>
      </div>
      ";
                }
                // line 45
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "  ";
        }
        // line 47
        echo "
  ";
        // line 48
        if ((isset($context["additional"]) ? $context["additional"] : null)) {
            // line 49
            echo "    <div class=\"sitemap-additional\">
      ";
            // line 50
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["additional"]) ? $context["additional"] : null), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 53
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/sitemap/templates/sitemap.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 53,  111 => 50,  108 => 49,  106 => 48,  103 => 47,  100 => 46,  94 => 45,  87 => 41,  84 => 40,  78 => 38,  76 => 37,  71 => 36,  68 => 35,  63 => 34,  61 => 33,  58 => 32,  52 => 29,  49 => 28,  47 => 27,  43 => 25,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Theme implementation to display the sitemap.
 *
 * Available variables:
 * - message: A configurable introductory message.
 * - sitemap_items: A keyed array of sitemap \"boxes\".
 *   The keys correspond to the available types of sitemap content, including:
 *   - front
 *   - books
 *   - individual menus
 *   - individual vocabularies
 *   Each items contains the following variables:
 *   - title: The subject of the box.
 *   - content: The content of the box.
 *   - attributes:  Optional attributes for the box.
 *   - options:  Options are set by sitemap.helper service.
 * - additional:
 *
 * @see template_preprocess()
 * @see template_preprocess_sitemap()
 */
#}

<div class=\"sitemap\">
  {% if message %}
    <div class=\"sitemap-message\">
      {{ message }}
    </div>
  {% endif %}

  {% if sitemap_items %}
    {% for item in sitemap_items %}
      {% if item.content is not empty %}
      <div{{ item.attributes.addClass('sitemap-box') }}>
        {% if item.options.show_titles %}
          <h2>{{ item.title }}</h2>
        {% endif %}
        <div class=\"content\">
          {{ item.content }}
        </div>
      </div>
      {% endif %}
    {% endfor %}
  {% endif %}

  {% if additional %}
    <div class=\"sitemap-additional\">
      {{ additional }}
    </div>
  {% endif %}
</div>
";
    }
}
