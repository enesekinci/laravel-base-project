import * as React from 'react';
import { useEditor, EditorContent } from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';
import Placeholder from '@tiptap/extension-placeholder';
import { cn } from '@/lib/utils';

interface RichTextEditorProps {
    value: string;
    onChange: (value: string) => void;
    placeholder?: string;
    className?: string;
    error?: string;
}

export function RichTextEditor({
    value,
    onChange,
    placeholder = 'İçerik yazın...',
    className,
    error,
}: RichTextEditorProps) {
    const editor = useEditor({
        extensions: [
            StarterKit.configure({
                heading: {
                    levels: [1, 2, 3],
                },
            }),
            Placeholder.configure({
                placeholder,
            }),
        ],
        content: value,
        onUpdate: ({ editor }) => {
            onChange(editor.getHTML());
        },
        editorProps: {
            attributes: {
                class: cn(
                    'prose prose-sm sm:prose-base lg:prose-lg xl:prose-2xl mx-auto focus:outline-none min-h-[200px] p-4',
                    'prose-headings:font-semibold',
                    'prose-p:text-gray-700 dark:prose-p:text-gray-300',
                    'prose-strong:text-gray-900 dark:prose-strong:text-gray-100',
                    'prose-ul:text-gray-700 dark:prose-ul:text-gray-300',
                    'prose-ol:text-gray-700 dark:prose-ol:text-gray-300',
                    'prose-li:text-gray-700 dark:prose-li:text-gray-300',
                    'prose-a:text-blue-600 dark:prose-a:text-blue-400',
                    'prose-blockquote:border-l-4 prose-blockquote:border-gray-300 dark:prose-blockquote:border-gray-600',
                    'prose-code:text-gray-800 dark:prose-code:text-gray-200',
                    'prose-pre:bg-gray-100 dark:prose-pre:bg-gray-800',
                ),
            },
        },
    });

    // Value değiştiğinde editor'ı güncelle (external update)
    React.useEffect(() => {
        if (editor && value !== editor.getHTML()) {
            editor.commands.setContent(value);
        }
    }, [value, editor]);

    if (!editor) {
        return null;
    }

    return (
        <div className={cn('space-y-2', className)}>
            <div
                className={cn(
                    'rounded-md border border-input bg-background',
                    error && 'border-destructive',
                )}
            >
                {/* Toolbar */}
                <div className="flex flex-wrap items-center gap-1 border-b border-input p-2">
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleBold().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('bold')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        <strong>B</strong>
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleItalic().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('italic')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        <em>I</em>
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleStrike().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('strike')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        <s>S</s>
                    </button>
                    <div className="mx-1 h-6 w-px bg-input" />
                    <button
                        type="button"
                        onClick={() =>
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 1 })
                                .run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('heading', { level: 1 })
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        H1
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 2 })
                                .run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('heading', { level: 2 })
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        H2
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor
                                .chain()
                                .focus()
                                .toggleHeading({ level: 3 })
                                .run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('heading', { level: 3 })
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        H3
                    </button>
                    <div className="mx-1 h-6 w-px bg-input" />
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleBulletList().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('bulletList')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        • Liste
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleOrderedList().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('orderedList')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        1. Liste
                    </button>
                    <div className="mx-1 h-6 w-px bg-input" />
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().toggleBlockquote().run()
                        }
                        className={cn(
                            'rounded px-2 py-1 text-sm font-medium transition-colors',
                            editor.isActive('blockquote')
                                ? 'bg-primary text-primary-foreground'
                                : 'hover:bg-accent',
                        )}
                    >
                        Alıntı
                    </button>
                    <button
                        type="button"
                        onClick={() =>
                            editor.chain().focus().setHorizontalRule().run()
                        }
                        className="rounded px-2 py-1 text-sm font-medium transition-colors hover:bg-accent"
                    >
                        ─
                    </button>
                </div>

                {/* Editor Content */}
                <EditorContent editor={editor} />
            </div>

            {error && (
                <p className="text-sm text-destructive">{error}</p>
            )}
        </div>
    );
}

