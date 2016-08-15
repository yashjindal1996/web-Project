<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="Books">

<html>
<body>
<div>
<xsl:value-of select="url"/>
</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>