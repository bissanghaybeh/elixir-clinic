# Examples (from the terminal):
# $ ruby minify.rb -m => minifies
# $ ruby minify.rb    => does not minify
#
# Using guard:
# $ guard => minifies

require 'optparse'

puts "Running minify.rb"

options = {}
OptionParser.new do |opts|
  opts.banner = "Usage: minify.rb [options]"

  opts.on("-j", "--javascript", "Compile Javascript") do |j|
    options[:js] = j
  end

  opts.on("-c", "--css", "Compile CSS") do |c|
    options[:css] = c
  end

  opts.on("-m", "--minify", "Minify JS/CSS") do |m|
    options[:minify] = m
  end
end.parse!

if options[:css]
  puts 'Compiling CSS...'
  css_files = Dir["sass/style.scss"].map do |file|
    compiled = file.gsub('.scss', '.css').gsub('sass/', '')
    "#{file}:#{compiled}"
  end

  `sass #{css_files.join(' ')} --sourcemap=none`

  if options[:minify]
    puts 'Minifying CSS...'
    css_files = Dir["sass/style.scss"].map do |file|
      minified = file.gsub('.scss', '.min.css').gsub('sass/', '')
      "#{file}:#{minified}"
    end

    `sass #{css_files.join(' ')} --style compressed --sourcemap=none`
  end
end

if options[:js]
  js_file = 'js/main.js'
  puts 'Compiling JS...'
  `juicer merge -f -i -m none #{js_file} -o #{js_file.gsub('.js', '.compiled.js')}`

  if options[:minify]
    puts 'Minifying JS...'
    `juicer merge -f -i -m yui_compressor #{js_file} -o #{js_file.gsub('.js', '.min.js')}`
  end
end
