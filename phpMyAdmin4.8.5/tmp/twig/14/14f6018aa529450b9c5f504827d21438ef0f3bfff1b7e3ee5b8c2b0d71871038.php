<?php

/* view_create.twig */
class __TwigTemplate_0c88aa34a93d3dfb886373a0bdec256eafe9f2fd965c9bc1ffe180380e124fda extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!-- CREATE VIEW options -->
<div id=\"div_view_options\">
    <form method=\"post\" action=\"view_create.php\">";
        // line 4
        echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
        echo "
    <fieldset>
        <legend>";
        // line 7
        if (($context["ajax_dialog"] ?? null)) {
            // line 8
            echo _gettext("Details");
        } else {
            // line 10
            if (($this->getAttribute(($context["view"] ?? null), "operation", [], "array") == "create")) {
                // line 11
                echo _gettext("Create view");
            } else {
                // line 13
                echo _gettext("Edit view");
            }
        }
        // line 16
        echo "        </legend>
        <table class=\"rte_table\">";
        // line 18
        if (($this->getAttribute(($context["view"] ?? null), "operation", [], "array") == "create")) {
            // line 19
            echo "                <tr>
                    <td class=\"nowrap\"><label for=\"or_replace\">OR REPLACE</label></td>
                    <td>
                        <input type=\"checkbox\" name=\"view[or_replace]\" id=\"or_replace\"";
            // line 23
            if ($this->getAttribute(($context["view"] ?? null), "or_replace", [], "array")) {
                echo " checked=\"checked\"";
            }
            // line 24
            echo "                            value=\"1\" />
                    </td>
                </tr>";
        }
        // line 28
        echo "
            <tr>
                <td class=\"nowrap\"><label for=\"algorithm\">ALGORITHM</label></td>
                <td>
                    <select name=\"view[algorithm]\" id=\"algorithm\">";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["view_algorithm_options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 34
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "\"";
            // line 35
            if (($this->getAttribute(($context["view"] ?? null), "algorithm", [], "array") == $context["option"])) {
                // line 36
                echo "                                    selected=\"selected\"";
            }
            // line 38
            echo "                            >";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </select>
                </td>
            </tr>

            <tr>
                <td class=\"nowrap\">";
        // line 45
        echo _gettext("Definer");
        echo "</td>
                <td><input type=\"text\" maxlength=\"100\" size=\"50\" name=\"view[definer]\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["view"] ?? null), "definer", [], "array"), "html", null, true);
        echo "\" /></td>
            </tr>

            <tr>
                <td class=\"nowrap\">SQL SECURITY</td>
                <td>
                    <select name=\"view[sql_security]\">
                        <option value=\"\"></option>";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["view_security_options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 55
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "\"";
            // line 56
            if (($context["option"] == $this->getAttribute(($context["view"] ?? null), "sql_security", [], "array"))) {
                echo " selected=\"selected\"";
            }
            // line 57
            echo "                            >";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "                    </select>
                </td>
            </tr>";
        // line 63
        if (($this->getAttribute(($context["view"] ?? null), "operation", [], "array") == "create")) {
            // line 64
            echo "                <tr>
                    <td class=\"nowrap\">";
            // line 65
            echo _gettext("VIEW name");
            echo "</td>
                    <td>
                        <input type=\"text\" size=\"20\" name=\"view[name]\" onfocus=\"this.select()\" maxlength=\"64\" value=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute(($context["view"] ?? null), "name", [], "array"), "html", null, true);
            echo "\" />
                    </td>
                </tr>";
        } else {
            // line 71
            echo "                <tr>
                    <td>
                        <input type=\"hidden\" name=\"view[name]\" value=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute(($context["view"] ?? null), "name", [], "array"), "html", null, true);
            echo "\" />
                    </td>
                </tr>";
        }
        // line 77
        echo "
            <tr>
                <td class=\"nowrap\">";
        // line 79
        echo _gettext("Column names");
        echo "</td>
                <td>
                    <input type=\"text\" maxlength=\"100\" size=\"50\" name=\"view[column_names]\" onfocus=\"this.select()\"  value=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute(($context["view"] ?? null), "column_names", [], "array"), "html", null, true);
        echo "\" />
                </td>
            </tr>

            <tr>
                <td class=\"nowrap\">AS</td>
                <td>
                    <textarea name=\"view[as]\" rows=\"15\" cols=\"40\" dir=\"";
        // line 88
        echo twig_escape_filter($this->env, ($context["text_dir"] ?? null), "html", null, true);
        echo "\" onclick=\"selectContent(this, sql_box_locked, true)\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["view"] ?? null), "as", [], "array"), "html", null, true);
        echo "</textarea><br/>
                    <input type=\"button\" value=\"Format\" id=\"format\" class=\"button sqlbutton\">
                    <span id=\"querymessage\"></span>
                </td>
            </tr>

            <tr>
                <td class=\"nowrap\">WITH CHECK OPTION</td>
                <td>
                    <select name=\"view[with]\">
                        <option value=\"\"></option>";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["view_with_options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 100
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "\"";
            // line 101
            if (($context["option"] == $this->getAttribute(($context["view"] ?? null), "with", [], "array"))) {
                echo " selected=\"selected\"";
            }
            // line 102
            echo "                            >";
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "                    </select>
                </td>
            </tr>

        </table>
    </fieldset>";
        // line 111
        if (($context["ajax_dialog"] ?? null)) {
            // line 112
            echo "        <fieldset class=\"tblFooters\">
            <input type=\"hidden\" name=\"";
            // line 113
            echo ((($this->getAttribute(($context["view"] ?? null), "operation", [], "array") == "create")) ? ("createview") : ("alterview"));
            echo "\" value=\"1\" />
            <input type=\"submit\" name=\"\" value=\"";
            // line 114
            echo _gettext("Go");
            echo "\" />
        </fieldset>";
        } else {
            // line 117
            echo "        <input type=\"hidden\" name=\"";
            echo ((($this->getAttribute(($context["view"] ?? null), "operation", [], "array") == "create")) ? ("createview") : ("alterview"));
            echo "\" value=\"1\" />
        <input type=\"hidden\" name=\"ajax_dialog\" value=\"1\" />
        <input type=\"hidden\" name=\"ajax_request\" value=\"1\" />
        <input type=\"submit\" name=\"\" value=\"";
            // line 120
            echo _gettext("Go");
            echo "\" />";
        }
        // line 122
        echo "
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "view_create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 122,  241 => 120,  234 => 117,  229 => 114,  225 => 113,  222 => 112,  220 => 111,  213 => 104,  205 => 102,  201 => 101,  197 => 100,  193 => 99,  178 => 88,  168 => 81,  163 => 79,  159 => 77,  153 => 73,  149 => 71,  143 => 67,  138 => 65,  135 => 64,  133 => 63,  129 => 59,  121 => 57,  117 => 56,  113 => 55,  109 => 54,  99 => 46,  95 => 45,  88 => 40,  80 => 38,  77 => 36,  75 => 35,  71 => 34,  67 => 33,  61 => 28,  56 => 24,  52 => 23,  47 => 19,  45 => 18,  42 => 16,  38 => 13,  35 => 11,  33 => 10,  30 => 8,  28 => 7,  23 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "view_create.twig", "D:\\phpstudy_pro\\WWW\\test\\phpMyAdmin4.8.5\\templates\\view_create.twig");
    }
}
