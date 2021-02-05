[{$smarty.block.parent}]

<tr>
    <td class="edittext">
        [{ oxmultilang ident="CATEGORY_MAIN_DEFSORT" }]
    </td>
    <td class="edittext" colspan="2">
        <select name="editval[oxmanufacturers__asy_defsort]" class="editinput" onChange="JavaScript:SchnellSortManager(this);">
            <option value="">[{ oxmultilang ident="CATEGORY_MAIN_NONE" }]</option>
            [{foreach from=$oView->getSortableFields() key=field item=desc}]
                [{assign var="ident" value=GENERAL_ARTICLE_$desc}]
                [{assign var="ident" value=$ident|oxupper }]
                <option value="[{ $desc }]" [{ if $edit->oxmanufacturers__asy_defsort->value == $desc }]SELECTED[{/if}]>[{ oxmultilang|oxtruncate:20:"..":true ident=$ident }]</option>
            [{/foreach}]
        </select>
        <input type="radio" class="editinput" name="editval[oxmanufacturers__asy_defsortmode]" value="0" [{if $edit->oxmanufacturers__asy_defsortmode->value=="0"}]checked[{/if}]>[{ oxmultilang ident="CATEGORY_MAIN_ASC" }]
        <input type="radio" class="editinput" name="editval[oxmanufacturers__asy_defsortmode]" value="1" [{if $edit->oxmanufacturers__asy_defsortmode->value=="1"}]checked[{/if}]>[{ oxmultilang ident="CATEGORY_MAIN_DESC" }]
        [{ oxinputhelp ident="HELP_CATEGORY_MAIN_DEFSORT" }]
    </td>
</tr>