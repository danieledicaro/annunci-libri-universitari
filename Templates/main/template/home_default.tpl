<div style="border:1px solid black">
    TITLE: {$title}
</div>

<div style="border:1px solid black">
    CONTENT TITLE: {$content_title}
</div>

<div style="border:1px solid black">
    MAIN CONTENT: {$main_content}
</div>

<div style="border:1px solid black">
    TOP CONTENT: {$top_content}
</div>

<div style="border:1px solid black">
    TASTI IN CIMA: {if $tasti_in_cima!=false}

                    {section name=i loop=$tasti_in_cima}
                        <li><a href="{$tasti_in_cima[i].link}">{$tasti_in_cima[i].testo}</a></li>
                    {/section}
    {/if}
</div>
