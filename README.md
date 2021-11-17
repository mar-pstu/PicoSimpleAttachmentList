# PicoSimpleAttachmentList
Plugin for SMS Pico. Creates an array of page attachments. 

Add the path to the attachment directory to the `files_dir` parameter of the page header. Information about files with doc, docx, odt, rtf, pdf, xlsx, xls, rar, zip, 7z, ppt, pptx extensions will be displayed in the twig `files` variable.

`
Title: Page Title
files_dir: dir1/dir2
`