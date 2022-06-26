<?php
  $sales_on=$_SESSION['LOGIN_MEMBER_ID'];
?>

<form action="saveexec.php" method="post" enctype='multipart/form-data'>
바코드숫자:<br/>
<input name="a" type="text" autocomplete="off"/><br />
분 류:<br />
<select name="b" id="b">
<option value="-" selected>=== 선택 ===</option>
<option value="의류">의류</option>
<option value="악세서리">악세서리</option>
<option value="생활용품">생활용품</option>
<option value="도서문구">도서문구</option>
<option value="디지털/가전">디지털/가전</option>
<option value="화장품">화장품</option>
<option value="미용도구">미용도구</option>
</select><br/>
상 품 명:<br />
<input name="c" type="text" size="70" autocomplete="off"/>
<br />
상품 설명:<br />
<input name="d" type="text" size="70" autocomplete="off"/>
<br />
수 량:<br />
<input name="e" type="text" autocomplete="off"/><br />
가 격:<br />
<input name="f" type="text" autocomplete="off"/><br />
키 워 드:<br />
<select name="g">
<option value="-" selected>=== 선택 ===</option>
<option value="gorgeous">화려함</option>
<option value="cute">귀여움</option>
<option value="simple">단순함</option>
<option value="vintage">빈티지</option>
<option value="casual">캐주얼</option>
</select><br/>
상품 이미지:<br/>
<input name="userfile" type="file"/><br/>
<input name="submit" type="submit" value="save" align="right"><br/>
</form>
