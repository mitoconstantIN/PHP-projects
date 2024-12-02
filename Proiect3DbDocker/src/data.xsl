<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
    <html>
        <head>
            <title>Data</title>
        </head>
        <body>
            <table border = "1">
                <tr bgcolor="red">
                    <th style="width:100px">username</th>
                    <th style="width:100px">password</th>
                    <th style="width:100px">role</th>
                    <th style="width:100px">image</th>
                    <th style="width:100px" colspan="3" align="center">Actions</th>
                </tr>
            <xsl:for-each select="root/date">
                <tr>
                <td style="width:100px"><xsl:value-of select="username"/></td>
                <td style="width:100px"><xsl:value-of select="password"/></td>
                <td style="width:100px"><xsl:value-of select="role"/></td>
                <td style="width:100px"><xsl:if test="image != ''">
                            <!-- Afișează imaginea -->
                            <img src="uploads/{image}" alt="Imaginea utilizatorului"/>
                        </xsl:if></td>
                <td colspan="3" style="width:200px">
                   <!-- <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="view"/>
                    </xsl:attribute>
                    <span>View</span>
                    </xsl:element>
                     -->
                    <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="edit"/>
                    </xsl:attribute>
                    <span>Edit</span>
                    </xsl:element>
                    <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="delete"/>
                    </xsl:attribute>
                    <xsl:attribute name="onclick">
                        <xsl:value-of select="confirm"/>
                    </xsl:attribute>
                    <span>Delete</span>
                    </xsl:element>
        </td>
        </tr>
    </xsl:for-each>
    </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>