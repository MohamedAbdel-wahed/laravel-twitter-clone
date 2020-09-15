module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    fontFamily:{
      'nunito':['Nunito']
    },
    extend: {
      spacing:{
        '60':'15rem',
        '72':'18rem',
        '84':'20rem',
        '96':'24rem',
        '100':'26rem',
        '104':'30rem',
        '106':'32rem',
        '108':'34rem',
        '110':'36rem',
      }
    },
  },
  variants: {
    transitionProperty: ['responsive', 'motion-safe', 'motion-reduce']
  },
  plugins: [],
}
