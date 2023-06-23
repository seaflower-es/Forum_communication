<?php

/* table/index_form.twig */
class __TwigTemplate_8cf82d7d055cfe9347fa01ff232252cad35679522dc5f8205490b9b9ccab6c81 extends Twig_Template
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
        echo "<form action=\"tbl_indexes.php\"
    method=\"post\"
    name=\"index_frm\"
    id=\"index_frm\"
    class=\"ajax\">";
        // line 7
        echo PhpMyAdmin\Url::getHiddenInputs(($context["form_params"] ?? null));
        echo "

    <fieldset id=\"index_edit_fields\">
        <div class=\"index_info\">
            <div>
                <div class=\"label\">
                    <strong>
                        <label for=\"input_index_name\">";
        // line 15
        echo _gettext("Index name:");
        // line 16
        echo PhpMyAdmin\Util::showHint(_gettext("\"PRIMARY\" <b>must</b> be the name of and <b>only of</b> a primary key!"));
        echo "
                        </label>
                    </strong>
                </div>

                <input type=\"text\"
                    name=\"index[Key_name]\"
                    id=\"input_index_name\"
                    size=\"25\"
                    maxlength=\"64\"
                    value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["index"] ?? null), "getName", [], "method"), "html", null, true);
        echo "\"
                    onfocus=\"this.select()\" />
            </div>

            <div>
                <div class=\"label\">
                    <strong>
                        <label for=\"select_index_choice\">";
        // line 34
        echo _gettext("Index choice:");
        // line 35
        echo PhpMyAdmin\Util::showMySQLDocu("ALTER_TABLE");
        echo "
                        </label>
                    </strong>
                </div>";
        // line 39
        echo $this->getAttribute(($context["index"] ?? null), "generateIndexChoiceSelector", [0 => ($context["create_edit_table"] ?? null)], "method");
        echo "
            </div>";
        // line 42
        echo PhpMyAdmin\Util::getDivForSliderEffect("indexoptions", _gettext("Advanced Options"));
        echo "

            <div>
                <div class=\"label\">
                    <strong>
                        <label for=\"input_key_block_size\">";
        // line 48
        echo _gettext("Key block size:");
        // line 49
        echo "                        </label>
                    </strong>
                </div>

                <input type=\"text\"
                    name=\"index[Key_block_size]\"
                    id=\"input_key_block_size\"
                    size=\"30\"
                    value=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute(($context["index"] ?? null), "getKeyBlockSize", [], "method"), "html", null, true);
        echo "\" />
            </div>

            <div>

                <div class=\"label\">
                    <strong>
                        <label for=\"select_index_type\">";
        // line 65
        echo _gettext("Index type:");
        // line 66
        echo PhpMyAdmin\Util::showMySQLDocu("ALTER_TABLE");
        echo "
                        </label>
                    </strong>
                </div>";
        // line 70
        echo $this->getAttribute(($context["index"] ?? null), "generateIndexTypeSelector", [], "method");
        echo "
            </div>

            <div>
                <div class=\"label\">
                    <strong>
                        <label for=\"input_parser\">";
        // line 77
        echo _gettext("Parser:");
        // line 78
        echo "                        </label>
                    </strong>
                </div>

                <input type=\"text\"
                    name=\"index[Parser]\"
                    id=\"input_parse\"
                    size=\"30\"
                    value=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute(($context["index"] ?? null), "getParser", [], "method"), "html", null, true);
        echo "\" />
            </div>

            <div>
                <div class=\"label\">
                    <strong>
                        <label for=\"input_index_comment\">";
        // line 93
        echo _gettext("Comment:");
        // line 94
        echo "                        </label>
                    </strong>
                </div>

                <input type=\"text\"
                    name=\"index[Index_comment]\"
                    id=\"input_index_comment\"
                    size=\"30\"
                    maxlength=\"1024\"
                    value=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute(($context["index"] ?? null), "getComment", [], "method"), "html", null, true);
        echo "\" />
            </div>
        </div>
        <!-- end of indexoptions div -->

        <div class=\"clearfloat\"></div>

        <table id=\"index_columns\">
            <thead>
                <tr>
                    <th></th>
                    <th>";
        // line 115
        echo _gettext("Column");
        // line 116
        echo "                    </th>
                    <th>";
        // line 118
        echo _gettext("Size");
        // line 119
        echo "                    </th>
                </tr>
            </thead>";
        // line 122
        $context["spatial_types"] = [0 => "geometry", 1 => "point", 2 => "linestring", 3 => "polygon", 4 => "multipoint", 5 => "multilinestring", 6 => "multipolygon", 7 => "geomtrycollection"];
        // line 132
        echo "            <tbody>";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["index"] ?? null), "getColumns", [], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 134
            echo "                    <tr class=\"noclick\">
                        <td>
                            <span class=\"drag_icon\" title=\"";
            // line 136
            echo _gettext("Drag to reorder");
            echo "\"></span>
                        </td>
                        <td>
                            <select name=\"index[columns][names][]\">
                                <option value=\"\">
                                    --";
            // line 141
            echo _gettext("Ignore");
            echo " --
                                </option>";
            // line 143
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
            foreach ($context['_seq'] as $context["field_name"] => $context["field_type"]) {
                // line 144
                if (((($this->getAttribute(($context["index"] ?? null), "getChoice", [], "method") != "FULLTEXT") || preg_match("/(char|text)/i",                 // line 145
$context["field_type"])) && (($this->getAttribute(                // line 146
($context["index"] ?? null), "getChoice", [], "method") != "SPATIAL") || twig_in_filter(                // line 147
$context["field_type"], ($context["spatial_types"] ?? null))))) {
                    // line 148
                    echo "
                                        <option value=\"";
                    // line 149
                    echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                    echo "\"";
                    // line 150
                    if (($context["field_name"] == $this->getAttribute($context["column"], "getName", [], "method"))) {
                        // line 151
                        echo "                                                selected=\"selected\"";
                    }
                    // line 152
                    echo ">";
                    // line 153
                    echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                    echo " [";
                    echo twig_escape_filter($this->env, $context["field_type"], "html", null, true);
                    echo "]
                                        </option>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['field_type'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 157
            echo "                            </select>
                        </td>
                        <td>
                            <input type=\"text\"
                                size=\"5\"
                                onfocus=\"this.select()\"
                                name=\"index[columns][sub_parts][]\"
                                value=\"";
            // line 164
            echo twig_escape_filter($this->env, ((($this->getAttribute(($context["index"] ?? null), "getChoice", [], "method") != "SPATIAL")) ? ($this->getAttribute(            // line 165
$context["column"], "getSubPart", [], "method")) : ("")), "html", null, true);
            echo "\" />
                        </td>
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 169
        if ((($context["add_fields"] ?? null) > 0)) {
            // line 170
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($context["add_fields"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 171
                echo "                        <tr class=\"noclick\">
                            <td>
                                <span class=\"drag_icon\" title=\"";
                // line 173
                echo _gettext("Drag to reorder");
                echo "\"></span>
                            </td>
                            <td>
                                <select name=\"index[columns][names][]\">
                                    <option value=\"\">--";
                // line 177
                echo _gettext("Ignore");
                echo " --</option>";
                // line 178
                $context["j"] = 0;
                // line 179
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
                foreach ($context['_seq'] as $context["field_name"] => $context["field_type"]) {
                    // line 180
                    if (($context["create_edit_table"] ?? null)) {
                        // line 181
                        $context["col_index"] = $this->getAttribute($context["field_type"], 1, [], "array");
                        // line 182
                        $context["field_type"] = $this->getAttribute($context["field_type"], 0, [], "array");
                    }
                    // line 184
                    $context["j"] = (($context["j"] ?? null) + 1);
                    // line 185
                    echo "                                        <option value=\"";
                    echo twig_escape_filter($this->env, (((isset($context["col_index"]) || array_key_exists("col_index", $context))) ? (                    // line 186
($context["col_index"] ?? null)) : ($context["field_name"])), "html", null, true);
                    echo "\"";
                    // line 187
                    echo (((($context["j"] ?? null) == $context["i"])) ? (" selected=\"selected\"") : (""));
                    echo ">";
                    // line 188
                    echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                    echo " [";
                    echo twig_escape_filter($this->env, $context["field_type"], "html", null, true);
                    echo "]
                                        </option>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['field_type'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 191
                echo "                                </select>
                            </td>
                            <td>
                                <input type=\"text\"
                                    size=\"5\"
                                    onfocus=\"this.select()\"
                                    name=\"index[columns][sub_parts][]\"
                                    value=\"\" />
                            </td>
                        </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 203
        echo "            </tbody>
        </table>
        <div class=\"add_more\">

            <div class=\"slider\"></div>
            <div class=\"add_fields hide\">
                <input type=\"submit\"
                    id=\"add_fields\"
                    value=\"";
        // line 211
        echo twig_escape_filter($this->env, sprintf(_gettext("Add %s column(s) to index"), 1), "html", null, true);
        echo "\" />
            </div>
        </div>
    </fieldset>
    <fieldset class=\"tblFooters\">
        <button type=\"submit\" id=\"preview_index_frm\">";
        // line 216
        echo _gettext("Preview SQL");
        echo "</button>
        <input type=\"submit\" id=\"save_index_frm\" value=\"";
        // line 217
        echo _gettext("Go");
        echo "\" />
    </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "table/index_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  345 => 217,  341 => 216,  333 => 211,  323 => 203,  307 => 191,  297 => 188,  294 => 187,  291 => 186,  289 => 185,  287 => 184,  284 => 182,  282 => 181,  280 => 180,  276 => 179,  274 => 178,  271 => 177,  264 => 173,  260 => 171,  256 => 170,  254 => 169,  245 => 165,  244 => 164,  235 => 157,  224 => 153,  222 => 152,  219 => 151,  217 => 150,  214 => 149,  211 => 148,  209 => 147,  208 => 146,  207 => 145,  206 => 144,  202 => 143,  198 => 141,  190 => 136,  186 => 134,  182 => 133,  180 => 132,  178 => 122,  174 => 119,  172 => 118,  169 => 116,  167 => 115,  153 => 103,  142 => 94,  140 => 93,  131 => 86,  121 => 78,  119 => 77,  110 => 70,  104 => 66,  102 => 65,  92 => 57,  82 => 49,  80 => 48,  72 => 42,  68 => 39,  62 => 35,  60 => 34,  50 => 26,  37 => 16,  35 => 15,  25 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/index_form.twig", "D:\\phpstudy_pro\\WWW\\test\\phpMyAdmin4.8.5\\templates\\table\\index_form.twig");
    }
}
