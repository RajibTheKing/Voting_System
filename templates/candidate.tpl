<form action="candidate.php" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
    {section name=i loop=$candidate_category}
    <tr bgcolor="#dddddd">
        <td align="center">
            <b>{$candidate_category[i].title}</b>
        </td>
    </tr>
    <tr>
        <td>
            {insert name=get_candidate category_id=$candidate_category[i].id assign=candidate}
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    {section name=j loop=$candidate}
                    <td width="33%" align="center">
                        <table  border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    {insert name=get_value table=student field=image_id id=$candidate[j].student_id assign=student_image_id}
                                    {insert name=get_image id=$student_image_id assign=image}{if $image[0].thumb_path}<img src='{$image[0].thumb_path}' height='100'>{else}<img src='images/photo_no.gif' height='100'>{/if}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Name :</b> {insert name=get_value table=student field=name id=$candidate[j].student_id}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Reg no :</b> {insert name=get_value table=student field=reg_no id=$candidate[j].student_id}
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    {assign var=index value=$smarty.section.i.index}
                                    <input type="radio" name="candidate[{$smarty.section.i.index}]" value="{$candidate[j].id}" {if $request.candidate.$index eq $candidate[j].id}checked{/if}>
                                </td>
                            </tr>
                        </table>                        
                    </td>
                    {if ($smarty.section.j.index+1)%3 eq 0}
                    </tr>
                    <tr>
                    {/if}
                    {/section}
                </tr>
            </table>
        </td>
    </tr>
    {/section}
    <tr>
        <td align="center">
            <input type="submit" name="submit" value="Submit">
        </td>
    </tr>
</table>
</form>
